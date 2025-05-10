<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة تقييم جديد</title>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .create-review-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .create-review-container h2 {
            margin-bottom: 25px;
            color: #0d47a1;
            font-size: 28px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        select:focus,
        textarea:focus {
            border-color: #0d47a1;
            outline: none;
        }

        .submit-review-btn {
            background-color: #0d47a1;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            display: block;
            width: 100%;
        }

        .submit-review-btn:hover {
            background-color: #0b3c91;
        }

        .back-link {
            display: block;
            text-align: left;
            margin-top: 15px;
            color: #0d47a1;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

       
    </style>
</head>
<body>

    <div class="create-review-container">
        <h2>أضف تقييمك</h2>

        <form action="{{ route('reviews.store', $destination->id) }}" method="POST">
            @csrf

            <label for="rating">التقييم (عدد النجوم):</label>
            <select name="rating" id="rating" required>
                <option value="5">⭐⭐⭐⭐⭐ (ممتاز)</option>
                <option value="4">⭐⭐⭐⭐ (جيد جدًا)</option>
                <option value="3">⭐⭐⭐ (جيد)</option>
                <option value="2">⭐⭐ (مقبول)</option>
                <option value="1">⭐ (ضعيف)</option>
            </select>

            <label for="comment">التعليق:</label>
            <textarea name="comment" id="comment" rows="5" placeholder="اكتب رأيك عن الوجهة..." required></textarea>

            <button type="submit" class="submit-review-btn">إرسال التقييم</button>
        </form>

        <a href="{{ route('explore.destinations.show', $destination->id) }}" class="back-link">← العودة لتفاصيل الوجهة</a>
    </div>

</body>
</html>
