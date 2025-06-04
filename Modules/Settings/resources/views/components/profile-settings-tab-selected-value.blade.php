@if (isset($form->prefer_not_say) && $form->prefer_not_say)
    {{ __('Prefer not say') }}
@else
    {{ $form->selected() }}
@endif