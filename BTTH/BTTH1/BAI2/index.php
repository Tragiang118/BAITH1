<?php
include 'header.php'; 
?>
<div class="container mt-5">
    <h2>Bài trắc nghiệm</h2>
    <form action="submit.php" method="post">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $question_id = $row['question_id'];
                $question_number = $row['question_number'];
                $question_text = $row['question_text'];
                $answers = [
                    'A' => $row['option_a'],
                    'B' => $row['option_b'],
                    'C' => $row['option_c'],
                    'D' => $row['option_d']
                ];
                ?>
                    <div class="card-header"><strong> <?php echo $question_number; ?>:</strong> <?php echo $row['question_text']; ?>
                    <div class="card-body">
                        <?php
                        foreach ($answers as $key => $answer) {
                            echo "<div class='form-check'>
                                    <input class='form-check-input' type='checkbox' name='question{$question_id}[]' value='{$key}' id='question{$question_id}{$key}'>
                                    <label class='form-check-label' for='question{$question_id}{$key}'>$answer</label>
                                  </div>";
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Không có câu hỏi nào.";
        }
        ?>
        <button type="submit" class="btn btn-primary mb-3 mt-3">Nộp bài</button>
    </form>
</div>
<?php
include 'footer.php'; 
?>

