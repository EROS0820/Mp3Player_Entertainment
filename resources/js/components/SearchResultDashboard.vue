<template>
    <div id="m">
        <p>
            <font :style="val">{{MUSIC[0]}}</font>
        </p>
        <form class="f" rel="descargar-mp3" @submit.prevent="submit">
            <input type="text" class="i" name="q" placeholder="Search artist or song ..." autocomplete="off" v-model="fields.search">
            <button class="i s">
                <b><font :style="val">LOOK FOR</font></b> 
                <i class="fa-search"></i>
            </button>
        </form>
        <div class="suggestion">
            <a class="btn btn-primary btn-suggestion" v-for="suggestion in suggestions" :key="suggestion" role="button" v-on:click="clickSuggestion(suggestion)">{{suggestion}}</a>
        </div>
        <section id="s" >
            <div class="tx">
                <p>
                    <font :style="val">{{MUSIC[1]}}<strong>download music</strong> {{MUSIC[2]}}</font>
                </p>
            </div>
            <h2 class="st ve">
                <i class="fa-star-full"></i><font :style="val">{{MUSIC[3]}}</font>
            </h2>
           
            <!-- <ul class="ls">
                <li v-for="(item, index) in items" :key="index">
                    {{ item }}
                    <div>
                        <h3><a v-bind:href="item.hreflink1"><font :style="val">{{item.title}}</font></a></h3>
                        <span><a v-bind:href="item.hreflink2"><font :style="val">{{item.songername}}</font></a></span>
                    </div>
                </li>
            </ul> -->

            <ul class="lsm mzk">
                <li v-for="(item, index) in songs" :key="index">
                    <div class="p _p" :id="'pp_'+item.encrypted_id">
                        <i class="fa-play3" :id="'play_'+item.encrypted_id" v-on:click="playAud(item.encrypted_id)"></i>
                    </div>
                    <div class="t">
                        <h3>{{item.title}}</h3>
                        <p>
                            <span>• Duración: {{item.duration}}</span>
                            <span>• Peso: {{item.length_seconds}}</span>
                        </p>
                    </div>
                    <div class="b">
                        <div class="e _p startbtn" :id="'startbtn_'+item.encrypted_id" v-on:click="playAud(item.encrypted_id)">
                        </div>
                        <div class="d dwndbtn" :id="'dwndbtn_'+item.encrypted_id" v-on:click="downloadAud(item.encrypted_id)">
                        </div>
						<div class="d dwn stopdbtn" :id="'stopdbtn_'+item.encrypted_id" v-on:click="stopdownloadAud(item.encrypted_id)" style="display:none;">
                        </div>
                    </div>
					<div class="dbtn" :id="'dbtn_'+item.encrypted_id" style="border-top: 1px solid #ccc; padding: 2px; margin-top: 14px; width: 100%; display:none;">
						<iframe :src="'https://ytconvert.in/button/mp3/'+item.encrypted_id+'/?l=es'" style="width:100%;height:70px;border:0;margin-top: 5px;" scrolling="no"></iframe>
					</div>
					
                </li>
            </ul>
           

            <h2 class="st ve"><i class="fa-star-full"></i><font :style="val"> TOP MP3 ARTISTS</font></h2>
            <!-- <ul class="lsi hm">
                <li v-for="imgitem in imgitems">
                    <a v-bind:href="imgitem.hreflink3">
                    <figure><img v-bind:src="imgitem.imgitemsrc1" v-bind:alt="imgitem.alt"></figure>
                    <span><font :style="val">{{imgitem.alt}}</font></span></a>
                </li>
            </ul> -->

            <div class="tx">
                <p><font :style="val">{{MUSIC[4]}}</font></p>

                <p>{{MUSIC[5]}}<strong>download mp3 music</strong> , the difference of <strong>MasMP3s</strong>{{MUSIC[6]}}</p>

                <p>{{MUSIC[7]}}<strong>MasMP3s</strong>{{MUSIC[8]}}</p>

                <p>With our spectacular<strong>music download</strong> {{MUSIC[9]}}<strong>download your music on our website</strong> .</p>

                <h2>Download Free Music in MasMP3s</h2>
                
                <p>{{MUSIC[10]}}<strong>Mp3 gratis</strong>{{MUSIC[11]}}</p>
                
                <p>Quizás te preguntarás, habiendo tantas páginas donde podéis <strong>descargar Mp3</strong>{{MUSIC[12]}}</p>

                <ul>
                    <li>Sistema completamente gratuito.</li>
                    <li>Descarga acelerada, no tendrás que esperar mucho tiempo para tener el archivo <strong>mp3 gratis</strong> guardado en tu ordenador.</li>
                    <li>Antes de descargar podrás escuchar la canción.</li>
                    <li>{{MUSIC[13]}}</li>
                    <li>{{MUSIC[14]}}</li>
                    <li>{{MUSIC[15]}}</li>
                </ul>

                <p>{{MUSIC[16]}}</p>
                
                <p>No lo pienses más, si estás en busca de una página web que te permite <strong>descargar música completamente gratis</strong> esta es tu mejor opción. en MasMP3s, podrás bajar todos los temas que desees en muy poco tiempo y sin preocuparte por nada.</p>

                <p>{{MUSIC[17]}}</p>

                <p>Es momento de optar por lo mejor, incluso si hablamos de <strong>descargar música gratis</strong>{{MUSIC[18]}}</p>

            </div>
            <h2 class="st az"><i class="fa-price-tag"></i> Búsquedas recomendadas</h2>
            <div class="tg">
                <div v-for="(musiclink, index) in musiclinks" :key="index">
                    <a v-bind:href="musiclink.herflink4">{{musiclink.title}}</a>
                </div>
            </div>
			
			<div id="audplayer" style="display:none;"></div>
			
        </section>
        <ScrollTopArrow/>
    </div>

</template>

<script>

var player = null;
import ScrollTopArrow from './global/ScrollTopArrow.vue'
export default {
    components: {
        ScrollTopArrow
    },
    props : {
        result : {
            type: Array
        }
    },
    data() {
        return{
            // songs: this.props.items,
            songs: {},
            val : "vertical-align:right;",
            fields : {},
            suggestions: [],
            MUSIC : [
                "All the music of your favorite artists can be found here; Search, listen, download and share with just one click ...",
                "Music is one of the few things that inspires us to move our bodies and calm our minds. We are all lovers of the good sounds and the moving lyrics of the artists that we follow, we will always want to be aware of their new hits and be able to listen to them at all times.The solution to this is simple, a web page that will allow you to",
                "in a completely free way.",
                "The Best Website to Download MP3 Music",
                "It is normal for you to find a way to get your favorite songs without spending money on paid platforms. Therefore, we present the best free alternative to download any type of music from your computer or any smart device. On this website, you will find a lot of new and classic titles by the most renowned artists in the music world.",
                "Although there are lots of web pages on the internet that allow you to ",
                " is its simplicity. Yes, we are talking about a platform that does not need many mechanics to perform your task. Just search for your favorite song in our music library, and download.",
                "In addition to offering you a completely easy-to-use platform,",
                " is also one of the most complete in terms of music. This means that we have tons of songs from different genres for all tastes. The favorite artists of all listeners are here, you do not need to search another website and waste time without having the results you want.",
                "service, you can update your music library in no time. Because in addition to providing a free service, it is also very fast, so that in a very short time your download will be completed. Next, we will show you all the steps you must follow to",
                "Queremos ser tu fuente proveedora de canciones, estando para ti en todo momento y ofrecerte un servicio de calidad. En nuestra página web podrás descargar música en formato ",
                ", sin tener que esperar un montón de tiempo. En MasMP3s, basta con buscar la canción que desees y darle click a la opción de descargar.",
                ", ¿que diferencia a esta web de las demás? Pues para responder a esta pregunta, te resumimos los beneficios de  utilizar nuestra web para bajar tu música completamente gratis.",
                "Funciona como plataforma para disfrutar de los mejores temas sin necesidad de descargarlos, si no quieres hacerlo. Basta con hacer click en el botón de escuchar y listo.",
                "Excelente herramienta de búsqueda de etiquetas (tag). Proporcionando la correcta información, nuestro buscador encontrará la canción que estás buscando sin ningún inconveniente.",
                "Formato Mp3, de esta manera cualquier tipo de dispositivo podrá reproducirlo sin tener problemas por compatibilidad de formatos.",
                "Nuestro servicio no se compara con el de cualquier otra página web de descarga de música. Nosotros somos tu mejor opción a la hora de actualizar tu biblioteca musical. No hace falta extendernos mucho, con solo leer la lista mencionada anteriormente, sabrás que estamos hablando de un excelente servicio.",
                "Olvídate de los problemas relacionados a la compatibilidad de los formato. Gracias a nuestro formato mp3, todas las canciones que descargues desde nuestra biblioteca podrás reproducirlas en cualquier dispositivo nin problemas.",
                ". Con MasMP3s, podrás bajar tu música favorita en muy poco tiempo y sin límites ni preocupaciones.",

            ],


          musiclinks : [
                {
                    hreflink4 : "{{route('artists')}}",
                    title : "Mp3xd"

                },
                {
                    hreflink4 : "{{route('tubidy')}}",
                    title : "Tubidy"

                },
                {
                    hreflink4 : "{{route('gente')}}",
                    title : "Genteflow"

                },
                {
                    hreflink4 : "{{route('relac')}}",
                    title : "relacion-sech"

                },
            ],

        

        }
     
    },
    mounted() {
        this.songs = this.result.sort((a, b) => (a.time_created < b.time_created) ? 1 : -1);
    },
    computed: {
        parseSearchKey () {
            return this.fields.search
        }
    },
    watch: {
        parseSearchKey: function(val, oldVal) {
            if (val.length >= 3) {
                axios.post('/suggest_list', {search: val}).then(response=> {
                    this.suggestions = response.data.items[1]
                }).catch(error => {
                    
                })
            }
        }
    },
    methods: {
        clickSuggestion: function(suggestion) {
            window.location = "/search/" + encodeURI(suggestion);
        },
        submit() {
            //if (window.location.href.search("search") == -1)
                window.location = "/search/" + encodeURI(this.fields.search);
            // else {
            //     this.errors = {};
            //     var searchobj = {search : encodeURI(this.fields.search)};
            //     axios.post('/search', searchobj).then(response => {
            //         this.songs = response.data.items.sort((a, b) => (a.time_created < b.time_created) ? 1 : -1);
            //         console.log(response);
            //     }).catch(error => {
            //         if (error.response.status === 422) {
            //             this.errors = error.response.data.errors || {};
            //         }
            //     });
            // }
        },
		playAud(audid) {
		
		var newplay = 1;
		
		    if(player!=null)
			{
			   var video_data = player.getVideoData()
			   if(player.getVideoData()['video_id'] == audid)
			   {
			        newplay = 0;
			   }
			}
			
			if(newplay==1)
			{
			      $("#audplayer").html("<div id=\"video-placeholder\"></div>");
					player = new YT.Player('video-placeholder', {
					width: 0,
					height: 0,
					videoId: audid,
					playerVars: { 'autoplay': 1 },
				   });
				   $("._p").removeClass("go");
				   $("#pp_"+audid).addClass("go");
				   $("#startbtn_"+audid).addClass("go");
				   $("#startbtn_"+audid).removeClass("startbtn");
			}
			else
			{
			   if(player.getPlayerState()==1 || player.getPlayerState()==3)
			   {
			      player.pauseVideo(); 
				  $("._p").removeClass("startbtn");
				  $("#pp_"+audid).removeClass("go");
				  $("#startbtn_"+audid).removeClass("go");
				  $("#startbtn_"+audid).addClass("startbtn");
			   }
			   else
			   {
			       player.playVideo(); 
				   $("._p").removeClass("go");
				   $("#pp_"+audid).addClass("go");
				   $("#startbtn_"+audid).addClass("go");
				   $("#startbtn_"+audid).removeClass("startbtn");
			   }
			}   
		},

		downloadAud(audio){
			$('.dbtn').hide();
			$('.stopdbtn').hide();
			$('.dwndbtn').show();
			$('#dbtn_'+audio).show();
			$('#dwndbtn_'+audio).hide();
			$('#stopdbtn_'+audio).show();
		},

		stopdownloadAud(audio){
			$('#dbtn_'+audio).hide();
			$('#dwndbtn_'+audio).show();
			$('#stopdbtn_'+audio).hide();
		}
    },
}



$(function() {

	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
});

</script>
<style>
    .btn-suggestion {
        margin-bottom: 10px;
        margin-right: 5px;
        background: #18BC9C;
        border-color: #18BC9C;
        color: white !important;
    }
    .btn {
        padding-top: 0px !important
    }
    .suggestion {
        text-align: center;
    }
</style>