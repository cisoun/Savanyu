var artworkToRemove;

function askToRemove(id) {

    var artwork = artworks.filter(x => x.id == id);
    
    if (artwork.length == 0) {
        return;
    }
    
    artwork = artwork[0];
    artworkToRemove = artwork;

    $('#removeModalTitle').html(artwork.title);
    $('#removeModal').modal('show');
}

function removeArtwork() {
    var id = artworkToRemove.id;
    window.location.replace(`${id}/destroy`);
}