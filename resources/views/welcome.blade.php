<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--scripts -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <!--alert taoast comp-->
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
          <div class="toast" style="position: absolute; top: 0; right: 0;background-color: green" data-delay="10000">
            <div class="alert alert-success" style="margin-bottom: 0;">
              <strong >Reordering priorities Succesfully</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
          </div>
        </div>
        <div class="flex-center position-ref full-height">
            

            <div class="content" style="position: absolute; top: 0;">
                <div class="title m-b-md">
                    Project Tasks
                </div>
                    <div>
                        <div class="row">
                            <div class="col-md-6"><h4>Tasks</h4></div>
                            <div class="col-md-3 offset-md-1"><h4>Priorities</h4></div>

                        </div>
                        <ul id="sortable" class="list-group">
                            @foreach ($tasks as $task)
                              <li class=" list-group-item d-flex justify-content-between align-items-center">
                                <span class="tasks">{{ $task->name }}</span>
                                <span class="badge badge-primary badge-pill">{{ $task->priorities }}</span>
                              </li>
                          
                           @endforeach

                        </ul>
                        <button  style="margin-top: 3px;" data-target="#modal1" data-toggle="modal" type="button" class="btn btn-primary col-md-3 offset-md-8" >Save</button>
                    </div>
            </div>
        </div>

        <div class="modal" id="modal1" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to reorder priorities?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="target" type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        
          <script>
              $( function() {
                $( "#sortable" ).sortable();
                $( "#sortable" ).disableSelection();

                function save(data){

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $('#modal1').modal('hide')
                    $.ajax({
                      method: "POST",
                      url: "/save",
                      data: {_token: CSRF_TOKEN, data:data},
                    })
                    .done(function( msg ) {
                        $('.toast').toast('show');
                        setTimeout(function(){
                            location.reload();

                         }, 2000);
                      });
                }

                $( "#target" ).click(function() {
                    let data = Array();
                        $( ".tasks" ).each(function( index ) {
                          data[index] = $( this ).text() 
                        });
                        save(data)
                });

              } );
          </script>
    </body>
</html>
