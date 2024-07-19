<div class="col-md-8">
    <div>
        <h1>{{ session()->get('message') ?? '' }}</h1>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" id="file" "/>
            <button type="submit" class="btn btn-success">Upload CSV/TSV</button>
        </form>
    </div>
</div>
