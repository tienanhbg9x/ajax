<!DOCTYPE html>
<html>
<head>
    <title>Laravel Pagination using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
        .pagination a {
            color: red;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <div id="table_data">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="5%">ID</th>
                    <th width="38%">Title</th>
                    <th width="57%">Description</th>
                </tr>
                @foreach($paginator as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $paginator->links() }}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.pagination a').unbind('click').on('click',function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        function fetch_data(page) {
            $.ajax({
                url:"/pagination/fetch_data?page="+page,
                type:'GET',
                dataType:'json',
                success:function (data) {
                    $("#table_data").html(data);
                }
            })
        }
    })
</script>
</body>
</html>

