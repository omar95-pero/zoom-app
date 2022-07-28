@if( App\Models\AdminGroup::find( $group_id ) )
    {{  App\Models\AdminGroup::find( $group_id )->name }}
@else
    تاجر
@endif
