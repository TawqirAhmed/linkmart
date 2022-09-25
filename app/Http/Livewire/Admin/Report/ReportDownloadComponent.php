<?php

namespace App\Http\Livewire\Admin\Report;

use Livewire\Component;

use App\Models\vendor;

class ReportDownloadComponent extends Component
{
    public function render()
    {
        $vendors = vendor::all();

        return view('livewire.admin.report.report-download-component',compact('vendors'))->layout('admin.adminbase');
    }
}
