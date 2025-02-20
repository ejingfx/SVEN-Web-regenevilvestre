<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    // GET /api/schedules
    public function index()
    {
        return Schedule::all(); // Fetch all schedules
    }

    // POST /api/schedules
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'frequency' => 'required|string',
            'start_date' => 'required|date',
            'days' => 'required|array',
            'times' => 'required|array',
            'notes' => 'nullable|string',
        ]);

        // Create and return the new schedule
        $schedule = Schedule::create($validated);
        return response()->json($schedule, 201);
    }

    // GET /api/schedules/{id}
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id); // Find a schedule by its ID
        return response()->json($schedule);
    }

    // PUT /api/schedules/{id}
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'frequency' => 'required|string',
            'start_date' => 'required|date',
            'days' => 'required|array',
            'times' => 'required|array',
            'notes' => 'nullable|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($validated); // Update the schedule with validated data

        return response()->json($schedule);
    }

    // DELETE /api/schedules/{id}
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete(); // Delete the schedule
        return response()->json(['message' => 'Schedule deleted successfully']);
    }
}
