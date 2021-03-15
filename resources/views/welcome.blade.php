<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>


    </script>
</head>

<body>
    <div class="container" id="page-content">

        <div class="">
            <br><br>
            <div class="row">
                <div class="col-2 offset-8"><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add
                        Task</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <form action="{{ route('tasks.store') }}" method="post">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Task Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Task Name"
                                                name="name">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Priority</label>
                                            <select class="form-control" name="priority">
                                                <option>Most Important</option>
                                                <option>Important</option>
                                                <option>Least Important</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary">Save </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="list list-row card" id="sortable" data-sortable-id="0" aria-dropeffect="move">
                            @foreach($tasks as $item)
                                <div class="list-item" data-item-sortable-id="0" draggable="true" role="option"
                                    aria-grabbed="false" style="">
                                    <div><a href="#" data-abc="true"><span
                                                class="w-40 avatar gd-primary">{{ $item->order }}</span></a></div>
                                    <div class="flex">
                                        <div class=" text-md taskname">{{ $item->name }}</div>
                                    </div>
                                    <div class="no-wrap">
                                        <div class=" text-md d-none d-md-block">
                                            {{ $item->created_at }}</div>
                                    </div>
                                    <div class="no-wrap">
                                        <div class=" text-md d-none d-md-block">
                                            {{ $item->priority }}</div>
                                    </div>
                                    <div>
                                        <button class="btn btn-danger">X</button>
                                       
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#myModal{{ $item->id }}">/</button>
                                        <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                                            <form action="tasks/{{ $item->id}}" method="post">
                                            <input name="_method" type="hidden" value="PUT">
                                                @csrf
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Task Name</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Enter Task Name" name="name" value="{{ $item->name }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Priority</label>
                                                                <select class="form-control" name="priority" value="{{ $item->priority }}">
                                                                    <option value="Most Important">Most Important</option>
                                                                    <option value="Important">Important</option>
                                                                    <option value="Least Important">Least Important</option>
                                                                </select>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary">Save </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
