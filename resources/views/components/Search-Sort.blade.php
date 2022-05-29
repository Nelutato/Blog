<div class="container border">
    <div class="row d-flex justify-content-between m-3 p-1">
        <div class="col-md-3 m-1">
            <form action={{ route('Recepie.sort') }} method="POST">
                @csrf
                <select name="sort" id="sortRecepies">
                    <option value="ASC" selected> Najstarsze </option>
                    <option value="DESC"> najnowsze </option>
                    <option value="price"> Najtańsze </option>
                    <option value="taste"> Najsmaczniejsze </option>
                    <option value="speed"> Najszybsze </option>
                </select>
                <button type="submit" class="btn border">
                    OK
                </button>
            </form>
        </div>
        <div class="col-md-3 m-1">
            <form action="{{ route('Recepie.search') }}" method="get" class="d-inline">
                <input type="search" name="search" id="search">
                <button type="submit" class="btn border">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>
