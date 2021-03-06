<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('Interno.schedule.schedule', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pieces = Piece::all();
        return view('Interno.schedule.create', compact('pieces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $schedule = Schedule::create($request);
            return redirect(route('agenda.index'))->with('success',
                'Tudo Certo! Evento Marcado!');

        }catch(\Exception $e){
        return redirect()->back()->with('error', $e->getMessage()/*'Foi mal! Falha ao marcar este evento!'*/);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Interno.schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $pieces = Piece::all();
        return view('Interno.schedule.edit', compact('schedule', 'pieces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $schedule = Schedule::findOrFail($id);
            $schedule->update($request->all());
            return redirect(route('agenda.show', $id))->with('success', 'Ae! Evento atualizado!');
        }catch(\Exception $e){
        return redirect()->back()->with('error', 'Foi mal! Erro ao atualizar esse Evento...');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Schedule::destroy($id);
            return redirect(route('agenda.index'))->with('success', 'Ae! Evento Excluído com sucesso!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Foi mal! Erro ao excluir esse Evento...');
        }
    }
}
