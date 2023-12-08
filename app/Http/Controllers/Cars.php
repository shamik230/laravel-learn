<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Car;
use App\Http\Requests\Cars\Save as SaveRequest;
use App\Http\Requests\Cars\Update as UpdateRequest;
use App\Http\Requests\Cars\Restore as RestoreRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Cars extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::orderByDesc('created_at')->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = config('cars.categories');
        return view('cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        $car = Car::create($request->validated());
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
        return view('cars.edit', compact('car','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Car $car)
    {
        $car->update($request->validated());
        $categories = config('cars.categories');
        return redirect()->route('cars.show', [$car->id])->with('status',trans('alerts.cars.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('status', trans('alerts.cars.delete'));
    }

    public function trash() {
        $categories = config('cars.categories');
        $cars = Car::onlyTrashed()->orderByDesc('deleted_at')->get();
        return view('cars.trash', compact('cars', 'categories'));
    }

    public function restore(string $id) {
        $car = Car::onlyTrashed()->findOrFail($id);
        $validator = Validator::make($car->toArray(), [
            'vin' => Rule::unique(Car::class, 'vin')->withoutTrashed(),
        ]);
        if ($validator->fails()) {
            return redirect()->route('cars.index')->with('statusDanger', trans('alerts.cars.restoreFail'));
        } else {
            $car->restore();
        }
        return redirect()->route('cars.index')->with('status', trans('alerts.cars.restore'));
    }
}
