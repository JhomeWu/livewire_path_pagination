<div>
    @foreach($migrations as $migration)
        @dump($migration->migration)
    @endforeach
    <br>
    <button
        wire:click="toPreviousPage()"
        @if($currentPage === 1)
        disabled
        @endif
    ><<<<</button>

    @foreach(range(1, $lastPage) as $pageCount)
        <button
            @if($pageCount == $currentPage)
            style="color:royalblue"
            @endif
            wire:click="toPage('p-{{$pageCount}}')"
        >Page{{$pageCount}}</button>
    @endforeach

    <button
        wire:click="toNextPage()"
        @if($currentPage === $lastPage)
        disabled
        @endif
    >>>>></button>
</div>
<script>

document.addEventListener('livewire:load', function () {
    Livewire.on('changePath', function (value) {
        window.history.pushState(null, null, '/p-' + value);
    });
});
</script>
