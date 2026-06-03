@extends('layouts.admin')

@section('content')

<script>
window.location.href = "{{ route('admin.categories.index') }}";
</script>

@endsection