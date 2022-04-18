<div id="compte">
    <div class="container">
        <div class="row">
            <h1 class="col-12 text-start">Compte</h1>
            <div class="card">
                <div class="row">
                    <div class="col-6">
                        <h2>Nom d'utilisateur</h2>
                        <span><?=$user->username?></span>
                    </div>
                    <div class="col-6">
                        <h2>Adresse mail</h2>
                        <span><?=$user->email?></span>
                    </div>
                </div>
            </div>
            <h1 id="stats" class="col-12 text-start">Statistiques</h1>
            <div class="card mb-3">
                <div class="row">
                    <div class="col-6">
                        <h2>Nombre de visites aujourd'hui</h2>
                        <span><?=$userStats->visitsToday?></span>
                    </div>
                    <div class="col-6">
                        <h2>Nombre de visites depuis toujours</h2>
                        <span><?=$userStats->visitsAllTime?></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-6">
                        <h2>Nombre de sujets postés</h2>
                        <span><?=$userStats->nombreSujets?></span>
                    </div>
                    <div class="col-6">
                        <h2>Nombre de messages postés</h2>
                        <span><?=$userStats->nombreMessages?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>