
 {{--{{var_dump($cliente->id)}}--}}
{{--@yield('content')--}}
{{--@section('content')--}}
 <h1>modal</h1>

 <section class="content">
                             {{--<div class="row">
                                 <div class="col-md-12">
                                     <div class="panel panel-primary">
                                         <div class="panel-heading">
                                             <h3 class="panel-title"> <i class="livicon" data-name="rocket" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> <strong>Advanced</strong>
                                                 customized Modals
                                             </h3>
                                             <span class="pull-right clickable">
                                                 <i class="glyphicon glyphicon-chevron-up"></i>
                                             </span>
                                         </div>
                                         <div class="panel-body modal-panel">

                                                 <div class="col-md-3">
                                                     <h3>
                                                         <strong>Flip and Rotate</strong>
                                                         effects
                                                     </h3>
                                                     <p>
                                                         You can customize the size of your modal. Just add the class
                                                         <code>modal-lg</code>
                                                         .
                                                     </p>

                                                     --}}{{--<button class="btn btn-effect btn-green1" data-modal="modal-13">3D Slit</button>--}}{{--
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>--}}
                             <!--moddal dialog -->

                             <div class="md-modal md-effect-13" id="modal-13">
                                 <div class="md-content">
                                     <h3>Modal Dialog</h3>
                                     {{--<div>--}}
                                     {{--{{dd($cliente)}}--}}
                                      {{--{{$clientes->id}}--}}
                                         {{--{{Form::text('nm_razao_social', isset($cliente->nm_razao_social) ? $cliente->nm_razao_social : Input::old('nm_razao_social'),array('class' => 'form-control'))}}--}}

                                        {{-- <ul>
                                             <li>
                                                 <strong>Read:</strong>
                                                 modal windows will probably tell you something important so don't forget to read what they say.
                                             </li>
                                             <li>
                                                 <strong>Look:</strong>
                                                 a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.
                                             </li>
                                             <li>
                                                 <strong>Close:</strong>
                                                 click on the button below to close the modal.
                                             </li>
                                         </ul>--}}
                                         <button class="btn btn-modal btn-default">Close me!</button>
                                     </div>
                                 </div>
                             </div>


                             <!-- END modal-->
                         </section>

    {{--<td>{{HTML::link('cliente/show/'.$clientes->id,'Show',array('class' => 'btn btn-effect btn-purple', 'title' => 'Show','data-modal'=>'modal-13','ref'=>'parent'))}}</td>--}}
{{--@stop--}}
    @section('footer_scripts')
    <script src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
    <script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>
    @stop