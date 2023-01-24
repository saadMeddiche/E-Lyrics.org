<?php
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$data = new ArtistsController();
$artists = $data->getAllArtists();

$data = new AlbumsController();
$albums = $data->getAllAlbums();
// onfocus="this.size=3";" onblur="this.size=0;" onchange="this.size=1"; this.blur()"

?>
<script>
    duplication(1);

    function updateAnimation(id, mod) {


        var FrontValue = document.getElementById("FrontValue" + id)

        var InputValue = document.getElementById("InputValue" + id)

        var ButtonOk = document.getElementById("ButtonOk" + id)

        var ButtonUpdate = document.getElementById("ButtonUpdate" + id)

        if (mod == 0) {

            ButtonUpdate.style.display = "none"
            FrontValue.style.display = "none"
            ButtonOk.style.display = "block"
            InputValue.style.display = "block"
            document.getElementById("InputValueAndButtonOk" + id).style.display = "block"

        } else {

        }
    }

    function duplication($multiple) {

        if (document.URL == "http://localhost/E-Lyrics.org/add") {

            if ($multiple <= 0) {
                alert("Can't Be 0 or lower then 0");
            } else if ($multiple > 1000) {

                alert("only 1000 or less , so your navigator can handle it");

            } else {

                document.getElementById("Train").value = $multiple;

                var text = `
            `;

                for (var i = 1; i <= $multiple; i++) {

                    text += `
                    
                <div class="card-header m-2">
                    <div class="form-group p-2">
                        <label for="Album${i}">Album ${i}</label>
                        <select  class="form-select" name="Album${i}" aria-label="Default select example" style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                            <?php foreach ($albums as $album) : ?>
                            <option value="<?php echo $album->ID_Album ?>"><?php echo $album->Name_Album ?> [<?php echo $album->Name_Artist ?>]</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group p-2">
                        <label for="Song${i}">Song ${i}</label>
                        <input type="text" name="Song${i}" class="form-control" placeholder="Song..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                    </div>
                    <div class="form-group p-2">
                        <label for="Words${i}">Words ${i}</label>
                        <textarea type="text" name="Words${i}" class="form-control" placeholder="Words..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold; height:150px;"></textarea>
                    </div>
                </div>
                
                `
                }

                document.getElementById("Cards").innerHTML = text;
            }


        }

        if (document.URL == "http://localhost/E-Lyrics.org/add?artist=758") {

            if ($multiple <= 0) {
                alert("Can't Be 0 or lower then 0");
            } else if ($multiple > 1000) {

                alert("only 1000 or less , so your navigator can handle it");

            } else {

                document.getElementById("Train").value = $multiple;

                var text = `
            `;

                for (var i = 1; i <= $multiple; i++) {

                    text += `
                <div class="card-header m-2">
                    <div class="form-group p-2">
                        <label for="Artist${i}">Artist ${i}</label>
                        <input type="text" name="Artist${i}" class="form-control" placeholder="Artist..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                    </div>
                </div>
                `
                }

                document.getElementById("Cards").innerHTML = text;
            }

        }

        if (document.URL == "http://localhost/E-Lyrics.org/add?album=758") {

            if ($multiple <= 0) {
                alert("Can't Be 0 or lower then 0");
            } else if ($multiple > 1000) {

                alert("only 1000 or less , so your navigator can handle it");

            } else {

                document.getElementById("Train").value = $multiple;

                var text = ``;

                for (var i = 1; i <= $multiple; i++) {

                    text += `
            <div class="card-header m-2">
                <div class="form-group p-2">
                    <label for="Album${i}">Album ${i}</label>
                    <input type="text" name="Album${i}" class="form-control" placeholder="Album..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                </div>
            </div>
            `
                }

                document.getElementById("Cards").innerHTML = text;
            }

        }

        if (document.URL == "http://localhost/E-Lyrics.org/add?songs=758") {

            if ($multiple <= 0) {
                alert("Can't Be 0 or lower then 0");
            } else if ($multiple > 1000) {

                alert("only 1000 or less , so your navigator can handle it");

            } else {

                document.getElementById("Train").value = $multiple;

                var text = ``;

                for (var i = 1; i <= $multiple; i++) {

                    text += `
                    <div class="card-header m-2">
                        <input type="hidden" name="Album${i}" value="<?php if (isset($_SESSION["IdOfAlbum"])) echo $_SESSION["IdOfAlbum"]  ?>" >
                        <div class="form-group p-2">
                            <label for="Song${i}">Song ${i}</label>
                            <input type="text" name="Song${i}" class="form-control" placeholder="Song..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;">
                        </div>
                        <div class="form-group p-2">
                            <label for="Words${i}">Words ${i}</label>
                            <textarea style="height:150px" type="text" name="Words${i}" class="form-control" placeholder="Words..." style="border-bottom:4px solid #03C988; color:#03C988; font-weight:bold;"></textarea>
                        </div>
                    </div>
                    `
                }

                document.getElementById("Cards").innerHTML = text;
            }

        }
    }

    function fillSong($id) {
        var NameOfSong = document.getElementById("NameOfSong" + $id).innerHTML;
        var WordsOfSong = document.getElementById("WordsOfSong" + $id).value;

        document.getElementById("ID_Song").value = $id
        document.getElementById("Song").value = NameOfSong;
        document.getElementById("words").innerHTML = WordsOfSong;


    }

    //This Function Fill the modal whith the information of the selected song
    //Trigger:Eye-Button In Home Page
    function fillHome(id) {

        //Collect The information From The Selected row [Song]
        var NameSong = document.getElementById("NameOfSong" + id).innerHTML
        var NameArtist = document.getElementById("NameOfArtist" + id).innerHTML
        var NameAlbum = document.getElementById("NameOfAlbum" + id).innerHTML
        var WordsSong = document.getElementById("wordsOFSong" + id).value

        //Fill The Modal With the information 
        document.getElementById("exampleModalToggleLabel").innerHTML = NameSong + "<b style='color:#1C82AD;'> By </b>" + NameArtist
        // document.getElementById("Artist").value = NameArtist
        // document.getElementById("Song").value = NameSong
        document.getElementById("Album").value = NameAlbum
        document.getElementById("Words").value = WordsSong

    }
</script>
