<!DOCTYPE html>
<html>

<head>
    <title>List Product Categories</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        .hinhSanPham {
            width: 100px;
            height: 100px;
        }

        .Info {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        .img-logo {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="Info">
                    Shop Petcare <br/>
                    Product Categories Table<br/>
                    http://petcareshop.com <br />
                    (0292)3.1111.999 # 0339522221<br />
                    <img style="img-logo" src="{{ asset('storage/images/logo.png') }}" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        @php
            $itemInPage = 13;
            $tongSoTrang = ceil(count($listProductCategories)/$itemInPage);
        @endphp
        <table border="1" align="center" cellpadding="10">
            <caption>List Product Categories</caption>
            <tr>
                <th colspan="7" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Describe</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            @foreach ($listProductCategories as $productCatetory)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td>{{ $productCatetory->pro_category_id }}</td>
                <td>{{ $productCatetory->pro_category_name }}</td>
                <td>{{ $productCatetory->pro_category_slug }}</td>
                <td>{{ $productCatetory->pro_category_desc }}</td>
                <td>{{ $productCatetory->pro_category_created_at }}</td>
                <td>{{ $productCatetory->pro_category_updated_at }}</td>
            </tr>
            @if (($loop->index + 1) % $itemInPage == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="10">
            <tr>
                <th colspan="7" align="center">Trang {{ 1 + floor(($loop->index + 1) / 10) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Describe</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>