<div>
	<div class="row justify-content-center" data-aos="fade-left" data-aos-offset="1" data-aos-delay="0" data-aos-duration="2000" data-aos-easing="ease-in-out" data-aos-once="false">
		@foreach($godisni_izvestai as $izvestaj)
		    <div class="col-lg-4 col-md-6 col-sm-6">
		        <div class="service-item mb-5">
		            <i class="ti-layers"></i>
		            <h5 class="mb-3">{{ \Carbon\Carbon::createFromFormat('Y-d-m H:i:s', $izvestaj->created_at)->format('d/m/Y') }}</h5>
		            <p>{{ $izvestaj->title }}</p>
		            <div class="update-center text-left">
		            	<a href="#" wire:click.prevent="downloadIzvestaj('{{ $izvestaj->file_name }}')" class="btn btn-small btn-solid-border btn-round-full">Преземи</a>
		            </div>
		        </div>
		    </div>
		@endforeach
	</div>
	
	<div class="w-100 text-xs-center" style="text-align: center!important;">
		{{ $godisni_izvestai->links() }}
	</div>
</div>
