<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/form.css">
    <title>Pursuit Technology Form</title>
</head>

<body>
    <div class="registration__form">
        <header class="header_container">
            <div class="pursuit-logo"></div>
            <h3>Registration Request</h3>
        </header>
        <form action="sendmail.php" method="post" class="form" enctype="multipart/form-data">
            <label>This course is identified in my Work Plan and Learning Agreement</label>
            <div class="input_group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="course_check" value="Yes" id="course_yes" required>
                    <label class="form-check-label" for="course_yes">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="course_check" value="No" id="course_no">
                    <label class="form-check-label" for="course_no">
                        No
                    </label>
                </div>
            </div>

            <div id="attend_reason_div">
                <label>I am attending this session because (tick all that apply)</label>
                <div class="input_group">
                        <div class="form-check">
                            <input class="attend form-check-input" type="checkbox" name="attend[]" value="It will help me develop the skills and knowledge required for my current role" id="attend_reason1" >
                            <label class="form-check-label" for="attend_reason1">
                                It will help me develop the skills and knowledge required for my current role
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="attend form-check-input" type="checkbox" name="attend[]" value="It will help me develop the skills and knowledge for a possible future role/body of work" id="attend_reason2">
                            <label class="form-check-label" for="attend_reason2">
                                It will help me develop the skills and knowledge for a possible future role/body of work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="attend form-check-input" type="checkbox" name="attend[]" value="It was identified as a need during my performance management discussions" id="attend_reason3">
                            <label class="form-check-label" for="attend_reason3">
                                It was identified as a need during my performance management discussions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="attend form-check-input" type="checkbox" name="attend[]" value="My manager recommended that I attend" id="attend_reason4">
                            <label class="form-check-label" for="attend_reason4">
                                My manager recommended that I attend
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="attend form-check-input" type="checkbox" name="attend[]" value="I am interested in the content" id="attend_reason5">
                            <label class="form-check-label" for="attend_reason5">
                                I am interested in the content
                            </label>
                        </div>
                </div>
            </div>

            <label>What would you like to achieve as a result of your attendance? For example, “I would like to learn to write better emails to improve my communication skills”.</label>
            <textarea type="text" name="achieve"></textarea>

            <label>Do you require adjustments or additions to the session delivery to support your participation? For example, hearing loop or wheelchair access.</label>
            <div class="input_group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="support_require" value="Yes" id="support_yes" required>
                    <label class="form-check-label" for="support_yes">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="support_require" value="No" id="support_no">
                    <label class="form-check-label" for="support_no">
                        No
                    </label>
                </div>
            </div>
       
            <div id="requirement_div">
                <label>Please provide details of your requirements.</label>
                <textarea required type="text" name="requirement" id="requirement"></textarea>
            </div>

            <label>Please upload any supporting documentation to support your registration request</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file[]" onchange="fileChange();" id="customFileLangHTML" multiple />
                <label class="custom-file-label" for="customFileLangHTML" data-browse="Browse" id="filesLabel" >Choose files:   </label>
            </div>
			
            <br/>
            <div class="actions"><button class="button" type="submit" id="submit_button">Submit</button></div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script type="text/javascript" src="js/form.js"></script>
</body>
</html>