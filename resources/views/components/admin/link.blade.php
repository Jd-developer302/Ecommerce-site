<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
       .page-link {
        font-size: 12px !important;
        color: #fdb916 !important;
        padding: 8px 12px !important;
    }

    .page-item.active .page-link {
        background-color: #fdb916 !important;
        border-color: #fdb916 !important;
        color: white !important;
    }

    .page-link:hover {
        background-color: #ddd !important;
        color: black !important;
    }
</style>
<div class="mt-5">
    {{ $products->links() }}
</div>