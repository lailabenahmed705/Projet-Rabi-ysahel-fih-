
<div>
<style type="text/css">
    #map {
        width: 100%;

        height: 400px;
    }

</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/2.9.8/leaflet-search.min.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/2.9.8/leaflet-search.min.js"></script>

<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Account Settings /</span> Locations
</h4>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('locations.countries.index') }}"><i class="mdi mdi-link mdi-20px me-1"></i>Countries</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('locations.states.index') }}"><i class="mdi mdi-link mdi-20px me-1"></i>States</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('locations.cities.index') }}"><i class="mdi mdi-link mdi-20px me-1"></i>Cities</a></li>
        </ul>
    </div>
</div>

</div>
  </div>
