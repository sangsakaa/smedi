<?php

namespace App\Observers;

use App\Models\Santri;
use App\Models\StatusSantri;

class SantriObserver
{
    /**
     * Handle the Santri "created" event.
     *
     * @param  \App\Models\Santri  $santri
     * @return void
     */
    public function created(Santri $santri)
    {
        //
    }

    /**
     * Handle the Santri "updated" event.
     *
     * @param  \App\Models\Santri  $santri
     * @return void
     */
    public function updating(Santri $santri)
    {
        if ($santri->status_santri !== $santri->getOriginal('status_santri')) {
            $statussantri = new StatusSantri();
            $statussantri->status = $santri->status_santri;
            $statussantri->santri_id = $santri->id;
            $statussantri->save();
        }
    }

    /**
     * Handle the Santri "deleted" event.
     *
     * @param  \App\Models\Santri  $santri
     * @return void
     */
    public function deleted(Santri $santri)
    {
        //
    }

    /**
     * Handle the Santri "restored" event.
     *
     * @param  \App\Models\Santri  $santri
     * @return void
     */
    public function restored(Santri $santri)
    {
        //
    }

    /**
     * Handle the Santri "force deleted" event.
     *
     * @param  \App\Models\Santri  $santri
     * @return void
     */
    public function forceDeleted(Santri $santri)
    {
        //
    }
}