<div class="container mt-5">
        <a href="index.php" class="btn btn-light mb-4">Back</a>
        <h2>Booking</h2>
        <form action="process_booking.php" method="post">
            <div class="form-group">
                <label for="fullname">Full name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['nama']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="officename">Office name</label>
                <input type="text" class="form-control" id="officename" name="officename" value="<?php echo htmlspecialchars($office['name']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="message">Your message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <input type="hidden" name="office_id" value="<?php echo htmlspecialchars($office_id); ?>">
            <button type="submit" class="btn btn-primary">Send your request</button>
        </form>
    </div>