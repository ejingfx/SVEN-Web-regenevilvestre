<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/schedules",
     *     summary="Get all schedules",
     *     tags={"Schedules"},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="frequency", type="string"),
     *                 @OA\Property(property="start_date", type="string", format="date"),
     *                 @OA\Property(property="days", type="array", @OA\Items(type="string")),
     *                 @OA\Property(property="times", type="array", @OA\Items(type="string")),
     *                 @OA\Property(property="notes", type="string", nullable=true)
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Schedule::all();
    }

    /**
     * @OA\Post(
     *     path="/api/schedules",
     *     summary="Create a new schedule",
     *     tags={"Schedules"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"frequency", "start_date", "days", "times"},
     *             @OA\Property(property="frequency", type="string"),
     *             @OA\Property(property="start_date", type="string", format="date"),
     *             @OA\Property(property="days", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="times", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="notes", type="string", nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Schedule created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'frequency' => 'required|string',
            'start_date' => 'required|date',
            'days' => 'required|array',
            'times' => 'required|array',
            'notes' => 'nullable|string',
        ]);

        $schedule = Schedule::create($validated);
        return response()->json(['success' => true, 'data' => $schedule], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/schedules/{id}",
     *     summary="Get a schedule by ID",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Schedule ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return response()->json($schedule);
    }

    /**
     * @OA\Put(
     *     path="/api/schedules/{id}",
     *     summary="Update a schedule",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Schedule ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="frequency", type="string"),
     *             @OA\Property(property="start_date", type="string", format="date"),
     *             @OA\Property(property="days", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="times", type="array", @OA\Items(type="string")),
     *             @OA\Property(property="notes", type="string", nullable=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Schedule updated successfully",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
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
        $schedule->update($validated);
        return response()->json($schedule);
    }

    /**
     * @OA\Delete(
     *     path="/api/schedules/{id}",
     *     summary="Delete a schedule",
     *     tags={"Schedules"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Schedule ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Schedule deleted successfully",
     *         @OA\JsonContent(type="object")
     *     )
     * )
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return response()->json(['message' => 'Schedule deleted successfully']);
    }
}
