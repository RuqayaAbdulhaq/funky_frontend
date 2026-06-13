<div class="modal fade" id="mediaModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Select Media</h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form id="mediaUploadForm" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-4">
                        <input type="file" name="file" id="mediaUploadFile" class="form-control">

                        <div class="input-group-append">
                            <button type="button" id="mediaUploadBtn" class="btn btn-success">
                                Upload
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-group">
                    <input type="text" id="mediaSearchInput" class="form-control" placeholder="Search media...">
                </div>

                <div class="row" id="mediaModalItems"></div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <button type="button" class="btn btn-secondary" id="mediaPrevPage">
                        Previous
                    </button>

                    <span id="mediaPageInfo"></span>

                    <button type="button" class="btn btn-secondary" id="mediaNextPage">
                        Next
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    let selectedInputId = null;
    let selectedPreviewId = null;
    let mediaCurrentPage = 1;
    let mediaSearch = '';


    function loadMediaItems(page = 1) {
        mediaCurrentPage = page;

        fetch(`{{ route('admin.media.modal.list') }}?page=${page}&search=${encodeURIComponent(mediaSearch)}`)
            .then(response => response.json())
            .then(result => {
                const wrapper = document.getElementById('mediaModalItems');
                const pageInfo = document.getElementById('mediaPageInfo');

                wrapper.innerHTML = '';

                result.data.forEach(item => {
                    wrapper.innerHTML += `
                                                                        <div class="col-md-3 mb-3">
                                                                            <div class="card media-select-card"
                                                                                data-id="${item.media_id}"
                                                                                data-url="${item.url}"
                                                                                data-name="${item.original_name ?? item.file_name}"
                                                                                style="cursor:pointer;">

                                                                                <img src="${item.url}"
                                                                                     class="card-img-top"
                                                                                     style="height:160px; object-fit:cover;">

                                                                                <div class="card-body p-2">
                                                                                    <small>${item.original_name ?? item.file_name}</small>
                                                                                    <br>
                                                                                    <strong>ID: ${item.media_id}</strong>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    `;
                });

                pageInfo.innerText = `Page ${result.current_page} of ${result.last_page}`;

                document.getElementById('mediaPrevPage').disabled = !result.prev_page_url;
                document.getElementById('mediaNextPage').disabled = !result.next_page_url;

                document.querySelectorAll('.media-select-card').forEach(card => {
                    card.addEventListener('click', function () {
                        document.getElementById(selectedInputId).value = this.dataset.id;

                        const preview = document.getElementById(selectedPreviewId);

                        preview.src = this.dataset.url;
                        preview.style.display = 'block';

                        const nameElement =
                            document.getElementById(selectedPreviewId + '_name');

                        if (nameElement) {
                            nameElement.innerText = this.dataset.name;
                        }

                        $('#mediaModal').modal('hide');
                    });
                });
            });
    }

    document.querySelectorAll('.open-media-modal').forEach(button => {
        button.addEventListener('click', function () {
            selectedInputId = this.dataset.targetInput;
            selectedPreviewId = this.dataset.preview;

            mediaCurrentPage = 1;
            loadMediaItems(1);

            $('#mediaModal').modal('show');
        });
    });

    document.getElementById('mediaSearchInput').addEventListener('input', function () {
        mediaSearch = this.value;
        loadMediaItems(1);
    });

    document.getElementById('mediaPrevPage').addEventListener('click', function () {
        if (mediaCurrentPage > 1) {
            loadMediaItems(mediaCurrentPage - 1);
        }
    });

    document.getElementById('mediaNextPage').addEventListener('click', function () {
        loadMediaItems(mediaCurrentPage + 1);
    });

    document.getElementById('mediaUploadBtn').addEventListener('click', function () {
        const form = document.getElementById('mediaUploadForm');
        const fileInput = document.getElementById('mediaUploadFile');

        if (!fileInput.files.length) {
            alert('Please select a file first.');
            return;
        }

        const formData = new FormData(form);

        fetch("{{ route('admin.media.modal.upload') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Accept': 'application/json'
            }
        })
            .then(async response => {
                const data = await response.json();

                if (!response.ok) {
                    let message = data.message || 'Upload failed';

                    if (data.errors) {
                        message = Object.values(data.errors).flat().join('\n');
                    }

                    alert(message);
                    return;
                }

                form.reset();
                loadMediaItems(1);
                alert('Uploaded successfully');
            })
            .catch(error => {
                console.error(error);
                alert('Upload failed. Check browser console.');
            });
    });
</script>