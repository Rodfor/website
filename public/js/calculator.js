window.onload = function(){

    let dEventStart = new Date(2019, 10, 18, 18); //Year, Month-1, Day, Hour, (Minute))
    let dEventEnd = new Date(2019, 10, 26, 18); //Year, Month-1, Day, Hour, (Minute))
    let dNow = new Date();
    let nHours = 0;
    let nMinutes = 0;
    let nTotalMinutes = 0;
    let eForm = document.calculator;
    let eHours = eForm.hours;
    let eMinutes = eForm.minutes;

    let nTimeRemaining = dEventEnd - dNow;
    let nEventDuration = Math.round((dEventEnd - dEventStart)/60000); //in minutes

    if (nTimeRemaining> 0) {
        nTotalMinutes = nTimeRemaining / 60000;
        nHours = Math.floor(nTotalMinutes / 60);
        nMinutes = Math.round(nTotalMinutes % 60);
    }
    eHours.value = nHours;
    eMinutes.value = nMinutes;

    if (eForm){
        eForm.addEventListener('submit', function(e){calculate(e, nEventDuration, this); });
    }
}

function calculate(e, nEventDuration, eForm){ 
    e.preventDefault();
    
    let nCurrent = parseInt(eForm.current.value);
    let nHoursRemaining = parseInt(eForm.hours.value);
    let nMinutesRemaining = parseInt(eForm.minutes.value);
    let nSpent = parseInt(eForm.spent.value);
    let nBought = parseInt(eForm.bought.value);
    let ePrediction = document.getElementById("prediction");
    let eRate = document.getElementById("rate");

    let nTimeRemaining = (nHoursRemaining*60) + nMinutesRemaining; //in minutes
    let nTimeElapsed = nEventDuration - nTimeRemaining;
    let nLoginBonus = Math.ceil(nTimeElapsed/1440)*100;
    let nRate = (nCurrent + nSpent - nBought - nLoginBonus)/nTimeElapsed; //Currency/minute
    let nRateHour = Math.round(nRate*60*100)/100;// Rate in hours 
    let nTimeDropRemaining = nTimeRemaining - 1440; //- the buy only period
    let nFutureLoginBonus = Math.floor(nTimeDropRemaining/1440)*100;
    let nFutureCampaignDrop = nRate * nTimeDropRemaining;

    let nPrediction = nCurrent + nBought + nFutureCampaignDrop + nFutureLoginBonus;
    ePrediction.innerHTML = 'Predicted amount of currency when event ends: '+ Math.round(nPrediction);
    eRate.innerHTML =  'Hourly rate with current behaviour: '+ nRateHour + '/hour';

    return;
}