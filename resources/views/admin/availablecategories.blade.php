<table class="table table-hover">
    <thead>
        <tr class="text-center">
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Edit</th>

        </tr>
    </thead>

    @foreach ($categories as $category)
        <tr>
            <td>{{ $category-> taskname }}</td>
            <td>{{ $category-> taskdescription }}</td>
            <td>
                <a class="btn btn-primary" href="#">
                    Edit
                </a>
            </td>
        </tr>

    @endforeach
</table>



