<template>
    <div id="addComponent">
        <div class="card text-white bg-dark">
            <div class="card-header">{{showDetails.name}} {{item[showDetails.column]}}</div>

            <div class="card-body">

                <table class="table table-dark table-bordered">
                    <tbody>
                        <tr v-for="c in columns" v-bind:key="c.id">
                            <th>{{c.name}}</th>
                            <td v-if="c.condition">{{c.condition[item[c.column]]}}</td>
                            <td v-else-if="c.subColumn">{{item[c.column][c.subColumn]}}</td>
                            <td v-else>{{item[c.column]}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</template>

<script>
export default {
    name : 'ShowComponent' ,
    props : {
        'item' : {
            type : Object ,
            required : true, 
        },
        'showDetails' : {
            type : Object , 
            required : true,
        },
        "columns" : {
            type : Array , 
            require : true,
        }
    },
    data(){
        return{
  
        }
    },
    created(){
        this.init();
    },
    methods : {
        init(){

        }
    }
}
</script>


<style lang="scss">
#addComponent{
    z-index : 1000;
    max-height : 80vh;
    overflow : auto;
}
</style>
