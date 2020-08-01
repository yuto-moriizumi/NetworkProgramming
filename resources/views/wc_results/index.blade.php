@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Wc Results</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('wcResults.create') }}">Add New</a>
        </h1>
    </section>
    
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <form action="" method="GET">
            {{ csrf_field() }}
            <div>
                <label>過去そのチームが勝利した試合の一覧を表示 IDを入力せよ</label><br>
                <input type="number" name="id" />
            </div>
            <div>
                <input type="submit" value="Create" />
            </div>
        </form>
        <p>チームID勝利検索：<?=$val?></p>
        <h2>高度な検索</h2>
        <form action="" method="GET" id="app">
            {{ csrf_field() }}
            <div>
                <label>大会で絞る</label><br>
                <select id="tournament_id" v-model="tournament_id" name="tournament_id" onchange="onChange('tournament_id')" @change="onTournamentChange">
                    <option value="null" selected>NONE</option>
                    <?php foreach ($search_info["tournaments"] as $option):?>
                        <option value=<?=$option["id"]?>><?=$option["name"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
                <div id="round_id" style="display:none">
                    <label>ラウンドで絞る</label><br>
                    <select name="round_id">
                        <option value="null" selected>NONE</option>
                        <option value="1">ノックアウト</option>
                        <option value="2">グループ</option>
                    </select>
                </div>  
            <div>
                <label>グループで絞る</label><br>
                <select name="group_id">
                    <option value="null" selected>NONE</option>
                    <?php foreach ($search_info["groups"] as $option):?>
                        <option value=<?=$option["id"]?>><?=$option["name"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label>チームで絞る</label><br>
                <select id="team_id" name="team_id" v-model="team_id" onchange="onChange('team_id')">
                    <option v-for="(value,key) in teams" v-text="value" v-bind:value="key"></option>
                </select>
            </div>
            <div id="outcome" style="display:none">
                <label>勝敗で絞る</label><br>
                <select name="outcome">
                    <option value="null" selected>NONE</option>
                    <option value="1">勝利</option>
                    <option value="0">引き分け</option>
                    <option value="-1">敗北</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Create" />
            </div>
        </form>
        <div class="box box-primary">
            <div class="box-body">
                    @include('wc_results.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13"></script>
        <script>
        const app=new Vue({
            el:"#app",
            data:{
                teams:{},
                test:["aea","aea"],
            },
            created:function(){
                console.log("hihihi");
            },
            methods:{
                onTournamentChange:function(){
                    console.log("tournament change");
                    const req=new XMLHttpRequest();
                    req.open("GET", "./api?tournament_id="+tournament_id,false);//大変なので同期処理
                    req.send(null);
                    
                    const res=JSON.parse(req.responseText);
                    console.log(res);
                    //this.$set(this, this.teams, res);
                    res["null"]="NONE";
                    this.teams=res;
                    this.team_id="null";
                }
            }
        });
        function onChange(id){
            const ind=document.getElementById(id).selectedIndex;
            switch(id){
                case 'tournament_id':
                    console.log("hi",ind);
                    if(ind>0) document.getElementById("round_id").style.display="block";
                    else document.getElementById("round_id").style.display="none";
                    break;
                case 'team_id':
                    console.log("hi",ind);
                    if(ind>0) document.getElementById("outcome").style.display="block";
                    else document.getElementById("outcome").style.display="none";
                    break; 
            }
            
            console.log(id);
        }
        </script>
    </div>
@endsection
