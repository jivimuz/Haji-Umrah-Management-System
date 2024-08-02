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
            aria-controls="panelsStayOpen-collapse{{ $no }}" style="background-color: #F0F0F0;color: #003059">
            {{ $i->group_name }}
        </button>
    </h2>
    <div id="panelsStayOpen-collapse{{ $no }}" class="accordion-collapse collapse show"
        aria-labelledby="panelsStayOpen-heading{{ $no++ }}">
        <div class="accordion-body row">
            @endif
            <div class="col-md-2 ">
                <div class="form-check d-block">
                    <input class="form-check-input group-{{ $i->group_id }}" type="checkbox"
                        onclick="addArray({{ $i->id }}, {{ $i->group_id }})" id="checkbox-{{ $i->id }}">
                    <label class="form-check-label" for="checkbox-{{ $i->id }}">
                        {{ $i->name }}
                    </label>
                </div>
            </div>
            @endforeach
            @if ($mod)
        </div>
        @endif
    </div>
</div>
<br>
<div class="float-end">
    <a type="button" class="mt-2 btn btn-success rounded-pill" id="saveAccess">
        <svg width="15" height="16" class="me-2" viewBox="0 0 19 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12.7162 14.2236H5.49622" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M12.7162 10.0371H5.49622" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path d="M8.25131 5.86035H5.49631" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.9086 0.75C12.9086 0.75 5.23161 0.754 5.21961 0.754C2.45961 0.771 0.75061 2.587 0.75061 5.357V14.553C0.75061 17.337 2.47261 19.16 5.25661 19.16C5.25661 19.16 12.9326 19.157 12.9456 19.157C15.7056 19.14 17.4156 17.323 17.4156 14.553V5.357C17.4156 2.573 15.6926 0.75 12.9086 0.75Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg> Save</a>
</div>
<script>
    var sArray = []

    <?php foreach($accessList as $i){?>
    sArray.push({
        'idg': {{ $i->group_id }},
        'ids': {{ $i->id }},
    });

    $('#checkbox-' + {{ $i->id }}).prop('checked', true)
    <?php } ?>


    $('#listRole').html(`<option value="-" selected  > Custom</option>` +
        <?php foreach($roleList as $i){?> `<option value="<?= $i->id ?>"  <?= $i->name == $role ? 'selected' : '' ?>  ><?= $i->name ?></option>` +
        <?php } ?> ''
    )

    function addArray(ids, idg) {

        $('#listRole option[value="-"]').prop('selected', true);
        if ($('#checkbox-' + ids).prop('checked')) {
            var index = sArray.findIndex(function(item) {
                return item.ids === ids;
            });
            if (index == -1) {
                sArray.push({
                    'idg': idg,
                    'ids': ids,
                });
            }

        } else {

            var index = sArray.findIndex(function(item) {
                return item.ids === ids;
            });

            if (index !== -1) {
                sArray.splice(index, 1);
            }
        }
        console.log(sArray)
    }


    $('#saveAccess').on('click', function(e) {
        e.preventDefault()
        $.ajax({
            url: "{{ url('access/saveAccess') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                userId: $("#userId").val(),
                sArray: sArray,
            },
            success: function(data) {
                Toast.fire({
                    icon: "success",
                    title: "Data Updated"
                });
                if ($("#userId").val() == <?= auth()->user()->id ?>) {
                    location.reload()
                }
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });
    })
</script>
