<?php

namespace App\Livewire\SuratKeluar;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\SuratKeluarForm;
use App\Livewire\SuratKeluar\SuratKeluarTable;

class SuratKeluarCreate extends Component
{
    public SuratKeluarForm $form;
    public $modalSuratKeluarCreate = false;

    public $bidang_surat;


    public function mount()
    {

        
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $roles = $user->getRoleNames();  
            $this->form->bidang_surat = $roles['0'];
            $this->bidang_surat = $roles['0'];
        }

    }




    public function save()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $roles = $user->getRoleNames();  
            $this->form->bidang_surat = $roles['0'];
            $this->bidang_surat = $roles['0'];
        }

        // dd($this->form);
        $this->validate();
        $simpan = $this->form->store();
        is_null($simpan)
            ? $this->dispatch('notify', title: 'fail', message: 'Data gagal disimpan')
            : $this->dispatch('notify', title: 'success', message: 'Data berhasil disimpan');
        $this->form->reset();
        $this->dispatch('dispatch-surat-keluar-create-save')->to(SuratKeluarTable::class);
        $this->modalSuratKeluarCreate = false;
        $this->bidang_surat = $roles['0'];

    }

    public function render()
    {
        return view('livewire.surat-keluar.surat-keluar-create');
    }



}
