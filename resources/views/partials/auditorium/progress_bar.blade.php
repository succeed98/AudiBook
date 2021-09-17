<?php $status = $aud->statusOn($date, $period) ?>

@if ($status == 0)
    <div class="progress-bar"
         style="width: 14.286%; background-color: #FF8C00;"
         data-toggle="tooltip"
         data-placement="top"
         title="Pendente">
        <span class="sr-only">Pending at {{ $period->name }}.</span>
    </div>

@elseif ($status == 1)
    @if ($canRequest)
        <div class="progress-bar"
             style="width: 14.286%; background-color: green;"
             data-toggle="tooltip"
             data-placement="top"
             title="Available">
            <span class="sr-only">Available at {{ $period->name }}.</span>
        </div>
    @else
        <div class="progress-bar"
             style="width: 14.286%; background-color: green;"
             data-toggle="tooltip"
             data-placement="top"
             title="Locked">
            <span class="sr-only">Locked at {{ $period->name }}.</span>
        </div>
    @endif

@else
    <div class="progress-bar"
         style="width: 14.286%; background-color: red;"
         data-toggle="tooltip"
         data-placement="top"
         title="Unavailable">
        <span class="sr-only">Unavailable at {{ $period->name }}.</span>
    </div>
@endif
