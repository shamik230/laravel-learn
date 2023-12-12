<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Enums\Cars\Status;
use App\Models\Car;
use App\Models\Brand;
use App\Http\Requests\Cars\Save as SaveRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Cars extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cars = Car::ofActive()->with('brand')->orderByDesc('created_at')->get();
        $cars = Car::with('brand')->orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = config('cars.categories');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title','id');
        return view('cars.create', compact('categories', 'brands', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        $data = collect($request->validated());
        $car = Car::make($data->except(['tags'])->toArray()); 
        DB::transaction(function () use ($car, $data) {
            $car->save();
            $car->tags()->attach($data->get('tags'));
        });
        return redirect()->route('cars.show', [$car->id])->with('status', trans('alerts.cars.add'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $categories = config('cars.categories');
        return view('cars.show', compact('car', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $categories = config('cars.categories');
        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $tags = Tag::orderBy('title')->pluck('title','id');
        return view('cars.edit', compact('car','categories', 'brands', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Car $car)
    {
        $data = collect($request->validated());

        DB::transaction(function () use ($car, $data) {
            $car->update($data->except(['tags'])->toArray());
            $car->tags()->sync($data->get('tags'));
        });
        return redirect()->route('cars.show', [$car->id])->with('status',trans('alerts.cars.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if(!$car->canDelete) {
            return redirect()->route('cars.show', [$car->id])->with('statusDanger', trans('alerts.cars.cantDelete'));
        }
        $car->delete();
        return redirect()->route('cars.index')->with('status', trans('alerts.cars.delete'));
    }

    public function trash() {
        $categories = config('cars.categories');
        $cars = Car::with('brand')->onlyTrashed()->orderByDesc('deleted_at')->get();
        return view('cars.trash', compact('cars', 'categories'));
    }

    public function restore(string $id) {
        $car = Car::onlyTrashed()->findOrFail($id);
        if (Car::where('vin', $car->vin)->exists()) {
            return redirect()->route('cars.trash')->with('statusDanger', trans('alerts.cars.restoreFail', ['vin' => $car->vin]));
        }
        $car->restore();
        return redirect()->route('cars.index')->with('status', trans('alerts.cars.restore'));
    }
}
