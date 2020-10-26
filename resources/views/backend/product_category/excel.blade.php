<table>
    <thead>
    <tr>
        <th>No.</th>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Describe</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($listProductCategories as $productCatetory)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $productCatetory->pro_category_id }}</td>
            <td>{{ $productCatetory->pro_category_name }}</td>
            <td>{{ $productCatetory->pro_category_slug }}</td>
            <td>{{ $productCatetory->pro_category_desc }}</td>
            <td>{{ $productCatetory->pro_category_status }}</td>
            <td>{{ $productCatetory->pro_category_created_at }}</td>
            <td>{{ $productCatetory->pro_category_updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>