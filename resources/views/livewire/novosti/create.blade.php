<div class="w-fill block">
    <form wire:submit.prevent="submit" enctype="multipart/form-data">

        <div class="flex flex-row flex-wrap -mx-4 items-stretch">
            <div class="w-full px-4">
                @if (session()->has('message'))
                    <div class="text-green-500 font-bold text-lg md:text-2xl">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="w-full px-4" wire:loading wire:target="image">Се прикачува...</div>
           
           <div class=" px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="type">Тип/Категорија*</label>
                <select wire:model="type" class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full">
                	<option :disabled="true" selected value="">-Избери тип-</option>
                    <option value="opsto">Општо</option>
                    <option value="izvestuvanja">Известувања</option>
                    <option value="finansiski_uslugi">Финансиски услуги</option>
                </select>
                @error('type') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div> 
            @props(['options' => []])
            @php
                $options = array_merge(['dateFormat' => 'd/m/Y','enableTime' => false,'altFormat' =>  'j F Y','altInput' => true], $options);
            @endphp

            <div class=" px-4 py-2" wire:ignore>
                <label class="block text-neutral-800 font-medium text-base mb-1" for="created_at">Датум*</label>
                <input autocomplete="off" id="created_at" wire:model="created_at" x-data="{init() {flatpickr(this.$refs.input, {{json_encode((object)$options)}});}}" x-ref="input" class="font-normal text-lg md:text-xl text-colormain placeholder:text-gray-500 min-h-[52px] py-2 px-4 bg-white transition-all rounded-md border-gray-300 border-solid border focus:border-colormain w-[360px] max-w-full">
                @error('created_at') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>

            <div class="w-full px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="title">Наслов*</label>
                <input type="text" id="title" wire:model="title" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                @error('title') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div> 
            

            <div class="px-4 py-2">
                <label class="block text-neutral-800 font-medium text-base mb-1" for="inputField">Слика*</label>
                <button type="button" style="cursor:pointer; border: 1px solid black" id="btn" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">Кликни за прикачување на слика</button>
                <input type="file" id="inputField" style="display:none" wire:model="image" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                <span class="text-sm block pt-0.5" id="file_name_display">@if($image != null) {{ $image->getClientOriginalName() }} @endif</span>
                @error('image') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
            </div>
            <div class="px-4 py-2">
                @if ($image != null)                
                    <img src="{{ $image->temporaryUrl() }}" class="mx-auto" style="width: 96px;">                
                @endif
            </div>

            <div wire:ignore class="w-full px-4 py-2" >
                <label class="block text-neutral-800 font-medium text-base mb-1" for="description">Опис*</label>
                <textarea id="description" wire:model='description' name="description" class="h-28">
                </textarea>
            </div>
            

            <div class="w-full px-4 py-2">
                <div class="flex flex-row justify-between items-center w-full pt-2">
                    <div>
                        <a href="{{ route('novosti') }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">Откажи</a>
                    </div>

                    <div>
                        <button type="submit" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-white bg-blue-500 text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 transition ease-in-out duration-200">Зачувај</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
	<script type="text/javascript">
		document.getElementById('btn').addEventListener('click', () => { 
			document.getElementById('inputField').click();
		});
	</script>

	<script src="{{ asset("/tinymce/tinymce.min.js") }}" referrerpolicy="origin"></script>
    <script>
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea#description',
            plugins: 'preview importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            image_advtab: true,
            //height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            promotion: false,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            file_picker_callback: function (cb, value, meta){
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function(){
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function(){
                        var id = 'blobid'+(new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title:file.name});
                    };
                };
                input.click();
            },
            setup: function (editor) {
                // editor.on('init change', function () {
                //     editor.save();
                // });
                editor.on('change', function (e) {
                    @this.set('description', editor.getContent());
                });
            }
        });
    </script>
@endpush
