<?php

namespace App\Livewire\SuratMasuk;

use App\Models\User;
use Livewire\Component;
use App\Models\SuratMasuk;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\SuratMasukForm;
use Illuminate\Support\Facades\Request;

class SuratMasukTable extends Component
{
    use WithPagination, WithSorting;

    public SuratMasukForm $form;

    public $paginate = 5; // Jumlah data per halaman
    public $sortBy = 'surat_masuk.id'; // Kolom default untuk pengurutan
    public $sortDirection = 'desc'; // Arah pengurutan default
    public $bidang_surat;
    public $hideDeleteButton = false;


    // Lifecycle Hook
    public function mount()
    {
        $this->setBidangSurat();


        $segment1 = Request::segment(1);
        $segment2 = Request::segment(2);

        if ($segment1 === 'sekretariat' && $segment2 !== null) {
            $this->hideDeleteButton = true;
        }
    }

    public function updated()
    {
        $this->setBidangSurat();
    }

    // Method untuk mengatur bidang_surat
    private function setBidangSurat()
    {
        if (Auth::check()) {
            $auth = Auth::user()->id;
            $user = User::find($auth);
            $roles = $user->getRoleNames();

            $this->form->bidang_surat = $roles[0];
            $this->bidang_surat = $roles[0];

            // Jika role adalah "sekretariat"
            if ($this->bidang_surat === 'sekretariat') {
                $routeSegment = Request::segment(2); // Ambil segment URL setelah "sekretariat/"
                $this->bidang_surat = $routeSegment ?: 'sekretariat'; // Default jika tidak ada segment
            }
        }
    }

    #[On('dispatch-surat-masuk-create-save')]
    #[On('dispatch-surat-masuk-update-edit')]
    #[On('dispatch-surat-masuk-delete-del')]
    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-table', [
            'data' => SuratMasuk::query()
                ->when($this->form->id, fn ($query, $id) => $query->where('id', 'like', '%' . $id . '%'))
                ->where('bidang_surat', $this->bidang_surat)
                ->when($this->form->kategori_surat, fn ($query, $kategori) => $query->where('kategori_surat', 'like', '%' . $kategori . '%'))
                ->when($this->form->tanggal_terima_surat, fn ($query, $tanggal) => $query->where('tanggal_terima_surat', 'like', '%' . $tanggal . '%'))
                ->when($this->form->no_agenda, fn ($query, $noAgenda) => $query->where('no_agenda', 'like', '%' . $noAgenda . '%'))
                ->when($this->form->nomor_surat, fn ($query, $nomor) => $query->where('nomor_surat', 'like', '%' . $nomor . '%'))
                ->when($this->form->asal_surat_pengirim, fn ($query, $asal) => $query->where('asal_surat_pengirim', 'like', '%' . $asal . '%'))
                ->with('suratKeluar')
                ->orderBy($this->sortBy, $this->sortDirection)->get()
        ]);
    }
}