        <div class="accordion" id="accordionPanelsStayOpenExample">
            <?php $mod = null;
            $no = 0; ?>
            @foreach ($menuList as $i)
                @if ($mod != $i->group_name)
                    @if ($mod)
        </div>
        </div>
        </div>
        @endif
        <?php $mod = $i->group_name; ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading{{ $no }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse{{ $no }}" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapse{{ $no }}"
                    style="background-color: #F0F0F0;color: #003059">
                    {{ $i->group_name }}
                </button>
            </h2>
            <div id="panelsStayOpen-collapse{{ $no }}" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-heading{{ $no++ }}">
                <div class="accordion-body row">
                    @endif
                    <div class="col-lg-2 col-md-3 col-sm-4 " style="justify-content: center; align-items: center">
                        <a href="{{ url('') }}{{ $i->route ?: str_replace(' ', '_', $i->group_menu) . '/' . str_replace(' ', '_', $i->name) }}"
                            class="btn text-center menu-list " style="width: 100%" alt=" {{ $i->name }}">
                            <h5 style=" margin-top:17px"><i class="{{ $i->icon ?: 'fa fa-user' }}"
                                    style="font-size: 40px;color: orange;"></i></h5>
                            <span style="font-size:10px; color: #a52e0c;min-width:100%">
                                {{-- <b> {{ strlen($i->name) > 24 ? substr($i->name, 0, 24) . '...' : $i->name }}</b> --}}
                                {{ $i->name }}
                            </span>
                            {{-- <p style="margin-top: -5px; font-size:10px; color: #003059;">
                                (&nbsp;{{ $i->group_name }}&nbsp;)
                            </p> --}}
                        </a>
                    </div>
                    @endforeach
                    @if ($mod)
                </div>
                @endif
            </div>
