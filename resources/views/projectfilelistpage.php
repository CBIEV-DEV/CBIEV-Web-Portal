<!DOCTYPE html>
<html lang="en">

<!-- upload -->
<form action="/process" method="post">
    <label for="projectFile">
        <input type="file" name="projectfiles[]" id="projectfile" multiple>
    </label>

<button type="submit" >Upload</button>
</div>

<!-- view upload -->
<div class="container">
    <div class="header">
    View Upload

    <div>
        <table class="table table-hover">
            <thead class="thead-light">
                <th scope="col">File</th>
                <th scope="col">Date</th>
                <th scope="col">Format</th>
                <th scope="col">Size</th>
             </thead>
            <tbody>
                @foreach ($projectfile as $pf)
                <tr>
                    <th scope="col">$projectfile = Storage::get($filename);</th>
                </tr>
                <tr><th scope="col"></th></tr>
                <tr></tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    </div>
</div>