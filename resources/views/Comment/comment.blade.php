<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Comments</h2>
    <div class="flex flex-col items-center my-8">
        <form action="/create-comment" method="post" class="w-full">
            @csrf
            <input class="hidden" type="number" name="product_id" value="{{ $product->id }}" />
            <textarea name="text" class="w-full border border-black rounded-full text-black p-4 mb-4"
                placeholder="Write your comment here..."></textarea>
            <div class="flex justify-center">
                <button type="submit" class="bg-red-600 text-white px-8 py-2 rounded">comment</button>
            </div>
        </form>
    </div>

    <div class="space-y-4">
        @foreach ($comments as $comment)
            <div class="border border-black p-4 rounded-lg shadow-md relative">
                <div class="flex justify-between items-center">
                    <p class="font-semibold">{{ $comment->user->username }} <span class="text-sm text-gray-500"> -
                            {{ $comment->updated_at }}</span></p>
                    @if (Auth::check() && (Auth::id() === $comment->user_id || Auth::user()->is_admin))
                        <div class="flex space-x-2">
                            <button onclick="editComment(this)" class="text-blue-500 hover:text-blue-700">
                                ✏
                            </button>
                            <a href="/delete-comment/{{ $comment->id }}" class="text-red-500 hover:text-red-700">
                                🥛
                            </a>
                        </div>
                    @endif
                </div>
                <p class="text-black mt-2">{{ $comment->text }}</p>

                @if (Auth::check() && (Auth::id() === $comment->user_id || Auth::user()->is_admin))
                    <form class="edit-form mt-2" style="display: none;" method="POST"
                        action="/edit-comment/{{ $comment->id }}">
                        @csrf
                        <textarea name="text" class="w-full border border-black rounded text-black p-2 mb-2"></textarea>
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded mt-2">Save</button>
                        <button type="button" onclick="cancelEdit(this)"
                            class="bg-gray-500 text-white px-2 py-1 rounded mt-2 ml-2">Cancel</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>


</div>

<script>
    function editComment(button) {
        const commentDiv = button.closest('.border');
        const commentText = commentDiv.querySelector('p.text-black');
        const form = commentDiv.querySelector('.edit-form');

        // Show the form and hide the comment text
        commentText.style.display = 'none';
        form.style.display = 'block';
        form.querySelector('textarea').value = commentText.textContent;
    }

    function cancelEdit(button) {
        const commentDiv = button.closest('.border');
        const form = commentDiv.querySelector('.edit-form');
        const commentText = commentDiv.querySelector('p.text-black');

        // Hide the form and show the comment text
        form.style.display = 'none';
        commentText.style.display = 'block';
    }
</script>

