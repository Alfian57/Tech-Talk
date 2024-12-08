<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} | {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="/assets/logo/logo.jpeg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/app/css/style.css">

    @livewireStyles

    @stack('styles')
</head>
