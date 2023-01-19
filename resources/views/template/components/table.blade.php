<div class="table-responsive">
    <table class="table table-hover table-borderless text-center my">
        <thead>
            <tr>
                @yield('thead')
            </tr>
        </thead>
        <tbody>
            @yield('tbody')
        </tbody>
    </table>
</div>
@isset($list)
    @if ($list->total() == 0)
        <div class="msg-empty">
            Nenhum registo encontrado.
        </div>
    @endif
    @if ($list->total() > 15)
        <hr class="bg-primary" />
    @endif
    <div id="pag" class="mt-3">
        {{ $list->links() }}
    </div>
@endisset
