
<!DOCTYPE html>
<html>
<head>
    <title>Borrowed Books Registry</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

    <h1>Borrowed Books Registry</h1>

    <button id="loadBooks">Load Books via AJAX</button>

    <h3>Borrower Information</h3>

    <table border="1">
        <tr>
            <th>Borrower ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact Number</th>
        </tr>

        <tbody id="borrower"></tbody>
    </table>

    <h3>Borrowed Books</h3>

    <table border="1">
        <thead>
            <tr>
                <th>Borrow ID</th>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>ISBN</th>
                <th>Borrow Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody id="books-list"></tbody>
    </table>

    <script>

        $(document).ready(function () {

            $('#loadBooks').click(function () {

                $.ajax({

                    url: '/get-books',
                    type: 'GET',
                    dataType: 'json',

                    success: function (data) {

                        // Borrower Information
                        $('#borrower').html(
                            '<tr>' +
                            '<td>' + data.borrower.borrower_id + '</td>' +
                            '<td>' + data.borrower.name + '</td>' +
                            '<td>' + data.borrower.age + '</td>' +
                            '<td>' + data.borrower.gender + '</td>' +
                            '<td>' + data.borrower.address + '</td>' +
                            '<td>' + data.borrower.email + '</td>' +
                            '<td>' + data.borrower.contact_number + '</td>' +
                            '</tr>'
                        );

                        // Borrowed Books
                        $('#books-list').empty();

                        $.each(data.borrowed_books, function (index, book) {

                            $('#books-list').append(
                                '<tr>' +
                                '<td>' + book.borrow_id + '</td>' +
                                '<td>' + book.book_id + '</td>' +
                                '<td>' + book.title + '</td>' +
                                '<td>' + book.author + '</td>' +
                                '<td>' + book.category + '</td>' +
                                '<td>' + book.isbn + '</td>' +
                                '<td>' + book.borrow_date + '</td>' +
                                '<td>' + book.due_date + '</td>' +
                                '<td>' + (book.return_date ?? 'Not Returned') + '</td>' +
                                '<td>' + book.status + '</td>' +
                                '</tr>'
                            );

                        });

                    },

                    error: function () {
                        alert('Failed to load books!');
                    }

                });

            });

        });

    </script>

</body>
</html>
