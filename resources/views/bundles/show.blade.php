@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="page-header">
        <h1 class="page-title">Bundle Details</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back</a>
            </ol>
        </div>
    </div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <div class="p-3 mt-4">
                <div class="mb-2">
                    <h4>Name:- </h4>{{ $bundle->name }}
                </div>
                <div>
                    <h4>Image:- </h4><img src="{{ URL::asset('image/' . $bundle->image) }}" alt="bundle" width="200px">
                </div>
                <div>
                    <h4>Price:- </h4>{{ $bundle->price }}
                </div>
                <div>
                    <h4>Description:- </h4>{!! $bundle->description !!}
                </div>
                <div class="table-responsive">
                    <h4>Products:- </h4>
                    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr style="background-color: #E4A11B;">
                                <th class="thClass">No</th>
                                <th class="thClass">Product</th>
                                <th class="thClass">Image</th>
                                <th class="thClass">Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @foreach ($lines as $key => $item)
                                <tr>
                                    <th scope="row" class="tdClass">{{ $key + 1 }}</th>
                                    <td class="tdClass">{{ $item->name }}</td>
                                    <td class="tdClass"><img src="{{ URL::asset('image/' . $item->image) }}" alt="product"
                                            width="100px">
                                    </td>
                                    <td class="tdClass">{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
            <div>
                <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal"
                    data-bs-target="#createReviewModal">
                    <i class="fa-solid fa-plus"></i> Review
                </button>
            </div>
            <div class="d-flex justify-content-end mt-4 mb-4">
                <a href="{{ route('bundles.edit', $bundle->id) }}" class="btn btn-dark text-white"><i
                        class="fa-solid fa-pencil"></i></a>
            </div>
        </div>
        <div class="card-body">
            @if ($reviews->count())
                <div class="table-responsive mt-5 ">
                    <h4 class="mx-5">Reviews:</h4>
                    <table class="table table-bordered mx-5">
                        <thead style="background-color: #E4A11B;">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Content</th>
                                <th>Rating</th>
                                <th>Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $index => $review)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $review->user->name ?? 'Guest' }}</td>
                                    <td>{{ $review->email ?? '-' }}</td>
                                    <td>{{ $review->phone ?? '-' }}</td>
                                    <td>{{ $review->content }}</td>
                                    <td>{{ $review->rating }} ★</td>
                                    <td>{{ $review->created_at->format('d M Y') }}</td>
                                    <td class="d-flex">
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this review?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger"
                                                style="border: none;background:none;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <!-- Trigger Modal -->
                                        <button type="button" class="btn btn-sm text-primary"
                                            style="border: none;background:none;" data-bs-toggle="modal"
                                            data-bs-target="#editReviewModal{{ $review->id }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Review Modal for this review -->
                                <div class="modal fade" id="editReviewModal{{ $review->id }}" tabindex="-1"
                                    aria-labelledby="editReviewModalLabel{{ $review->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editReviewModalLabel{{ $review->id }}">
                                                        Edit Review</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="email{{ $review->id }}"
                                                            class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            id="email{{ $review->id }}" value="{{ $review->email }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone{{ $review->id }}"
                                                            class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            id="phone{{ $review->id }}" value="{{ $review->phone }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="content{{ $review->id }}" class="form-label">Review
                                                            Content</label>
                                                        <textarea name="content" class="form-control" id="content{{ $review->id }}" rows="3">{{ $review->content }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="rating{{ $review->id }}"
                                                            class="form-label">Rating</label>
                                                        <select name="rating" class="form-select"
                                                            id="rating{{ $review->id }}">
                                                            <option value="">Select rating</option>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $review->rating == $i ? 'selected' : '' }}>
                                                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
    <!-- Modal -->



    <!-- Create Review Modal -->
    <div class="modal fade" id="createReviewModal" tabindex="-1" aria-labelledby="createReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="reviewable_type" value="App\Models\Bundle">
                    <input type="hidden" name="reviewable_id" value="{{ $bundle->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="createReviewModalLabel">Add New Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User (optional)</label>
                            <select class="form-select" name="user_id" id="user_id">
                                @foreach ($users as $key => $user)
                                    <option value="{{ $key }}">{{ $user }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email (optional)</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone (optional)</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Review Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="">Select rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
