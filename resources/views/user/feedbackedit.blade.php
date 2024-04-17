
<div class="container">
    <h1>Edit Feedback</h1>
    <form method="post" action="{{ route('feedback.update', $review->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="rating-container">
                <label for="rating">Rating:</label>
                <div class="star-rating">
                    <input type="radio" id="star1" name="rating" value="1">
                    <input type="radio" id="star2" name="rating" value="2">
                    <input type="radio" id="star3" name="rating" value="3">
                    <input type="radio" id="star4" name="rating" value="4">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star1" title="1 star"></label>
                    <label for="star2" title="2 stars"></label>
                    <label for="star3" title="3 stars"></label>
                    <label for="star4" title="4 stars"></label>
                    <label for="star5" title="5 stars"></label>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="feedback">Feedback:</label>
            <textarea name="feedback" id="feedback" cols="30" rows="5" required>{{ $review->feedback }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Feedback</button>
    </form>
</div>