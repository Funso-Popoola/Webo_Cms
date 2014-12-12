/**
 * Created by root on 11/1/14.
 */

var Items = {
    NEWS_ITEM :         '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                            <div class="form-group">\
                                <label for="news_type">Type:</label>\
                                <select id="news_type" class = "form-control" name="news_type">\
                                    <option value="">--select--</option>\
                                    <option value="In_the_Media">In The Media:Department In The News</option>\
                                    <option value="Announcement">Announcement In The Order Of Urgency</option>\
                                    <option value="Calendar">Calendar/Timetable</option>\
                                    <option value="Seminars">Public Lectures and Seminars</option>\
                                </select>\
                            </div>\
                            <div class="form-group">\
                                <label for="title">Title:</label>\
                                <input id="title" class = "form-control" type="text" name="title">\
                            </div>\
                            <div class="form-group">\
                                <label for="details">Details:</label>\
                                <textarea id="news_textarea_'+id+'" class = "form-control" name="news_content"></textarea>\
                            </div>\
                            <div class="form-group">\
                                <label for="author">Author:</label>\
                                <input id="news_author" class = "form-control" type="text" name="news_author">\
                            </div>\
                            <div class="form-group">\
                                <input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                                <input type="hidden" name="all_forms" value="news"/>\
                            </div>\
                        </form>',

    RESEARCH_ITEM : '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                            <div class="form-group">\
                            <label for="news_type">Type:</label>\
                            <select id="research_type" class="form-control" name="research_type">\
                                <option value="">--select type--</option>\
                                <option value="Papers">Papers</option>\
                                <option value="Proj_and_Pu">Projects/Publications</option>\
                                <option value="Labs">Labs</option>\
                                <option value="Conf">Conference</option>\
                            </select>\
                            </div>\
                            <div class="form-group">\
                                <label for="title">Title:</label>\
                                <input id="research_title" class="form-control" type="text" name="research_title">\
                            </div>\
                            <div class="form-group">\
                                <label for="author">Author:</label>\
                                <input id="research_author" class = "form-control" type="text" name="research_author">\
                            </div>\
                            <div class="form-group">\
                                <label for="link">Link:</label>\
                                <input id="research_link"class = "form-control" type="text" name="research_link">\
                            </div>\
                            <div class="form-group">\
                                <label for="description">Description:</label>\
                                <textarea id="research_textarea_'+id+'" class = "form-control" name="research_desc"></textarea>\
                            </div>\
                            <div class="form-group">\
                                <input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                                <input type="hidden" name="all_forms" value="research"/>\
                            </div>\
                        </form>',

    RESOURCE_ITEM : '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                            <div class="form-group">\
                                <label for="news_type">Type:</label>\
                                <select id="res_type" class="form-control" name="res_type">\
                                    <option value="">--select--</option>\
                                    <option value="coursenote">Course Note</option>\
                                    <option value="assignment">Assignment</option>\
                                </select>\
                            </div>\
                            <div class="form-group">\
                                <label for="title">Title:</label>\
                                <input id="res_title" class = "form-control" type="text" name="res_title">\
                            </div>\
                            <div class="form-group">\
                                <label for="author">Author:</label>\
                                <input id="res_author" class = "form-control" type="text" name="res_author">\
                            </div>\
                            <div class="form-group">\
                                <label for="course">Course:</label>\
                                <input id="res_cos" class = "form-control" type="text" name="res_cos">\
                            </div>\
                            <div class="form-group">\
                                <label for="url">Upload:</label>\
                                <input id="res_url" class = "form-control" type="file" name="res_url">\
                                <p id="res_help" class="help-block" align="right"></p>\
                            </div>\
                            <div class="form-group">\
                                <label for="description">Description:</label>\
                                <textarea id="resources_textarea_'+id+'" class = "form-control" name="res_desc"></textarea>\
                            </div>\
                            <div class="form-group">\
                                <input type="hidden" name="date" value="2014-05-28 00:00:00"/>\
                                <input type="hidden" name="all_forms" value="resources"/>\
                            </div>\
                        </form>',

    COURSE_ITEM : '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                        <div class="form-group">\
                            <label for="cos_type">Type:</label>\
                            <select id="cos_type" class="form-control" name="cos_type">\
                                <option value="">--select--</option>\
                                <option value="underg">Undergraduate</option>\
                                <option value="postg">Postgraduate</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="c_code">Course Code:</label>\
                            <input id="cos_code" class = "form-control" type="text" name="cos_code">\
                        </div>\
                        <div class="form-group">\
                            <label for="c_title">Course Title:</label>\
                            <input id="cos_title" class = "form-control" type="text" name="cos_title">\
                        </div>\
                        <div class="form-group">\
                            <label for="description">Description:</label>\
                            <textarea id="courses_textarea_'+id+'" class = "form-control" name="cos_desc"></textarea>\
                        </div>\
                        <div class="form-group">\
                            <input type="hidden" name="all_forms" value="courses"/>\
                        </div></form>',

    PROGRAM_ITEM : '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                        <div class="form-group">\
                            <label for="prog_type">Type:</label>\
                            <select id="prog_type" class="form-control" name="prog_type">\
                                <option value="">--select--</option>\
                                <option value="underg">Undergraduate</option>\
                                <option value="postg">Postgraduate</option>\
                            </select>\
                        </div>\
                        <div class="form-group">\
                            <label for="name">Name:</label>\
                            <input id="prog_name" class = "form-control" type="text" name="prog_name">\
                        </div>\
                        <div class="form-group">\
                            <label for="details">Details:</label>\
                            <textarea id="prog_textarea_'+id+'" class = "form-control" name="prog_details"></textarea>\
                        </div>\
                        <div class="form-group">\
                            <input type="hidden" name="all_forms" value="programmes"/>\
                        </div>\
                    </form>',

    STAFF_ITEM :    '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                        <div class="form-group">\
                            <label for="name">Name:</label>\
                            <input id="people_name" class = "form-control" type="text" name="staff_name">\
                        </div>\
                        <div class="form-group">\
                            <label for="link">Scholar Link:</label>\
                            <input id="people_link"class = "form-control" type="text" name="staff_link">\
                        </div>\
                        <div class="form-group">\
                            <label for="bios">Bio:</label>\
                            <textarea id="staff_textarea_'+id+'" class = "form-control" name="staff_details"></textarea>\
                        </div>\
                        <input type="hidden" name="staff_cat" value="staff"/>\
                        <input type="hidden" name="all_forms" value="people"/>\
                    </form>',

    STUDENT_GROUP_ITEM :    '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                                <div class="form-group">\
                                    <label for="name">Group Name:</label>\
                                    <input id="people_name" class = "form-control" type="text" name="student_name">\
                                </div>\
                                <div class="form-group">\
                                    <label for="link">Website:</label>\
                                    <input id="people_link" class = "form-control" type="text" name="student_link">\
                                </div>\
                                <div class="form-group">\
                                    <label for="description">Description:</label>\
                                    <textarea id="stud_group_textarea_'+id+'" class = "form-control" name="student_desc"></textarea>\
                                </div>\
                                <input type="hidden" name="staff_cat" value="stud_group"/>\
                                <input type="hidden" name="all_forms" value="people"/>\
                            </form>',

    ALUMNI_ITEM : '<form role="form" enctype="multipart/form-data" method="POST" action="dbEntry.php">\
                        <div class="form-group" >\
                            <label for="name">Name:</label>\
                            <input id="people_name"  class = "form-control" type="text" name="alumni_name">\
                        </div>\
                        <div class="form-group">\
                            <label for="link">Link:</label>\
                            <input id="people_link" class = "form-control" type="text" name="alumni_link">\
                        </div>\
                        <div class="form-group">\
                            <label for="description">Description:</label>\
                            <textarea id="alumni_textarea_'+id+'" class = "form-control" name="alumni_desc"></textarea>\
                        </div>\
                        <input type="hidden" name="staff_cat" value="alumni"/>\
                        <input type="hidden" name="all_forms" value="people"/></form>'
};
