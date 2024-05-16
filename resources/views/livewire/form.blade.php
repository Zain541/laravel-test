<div>
    <div>
        @if($showPage1 === true)
            <livewire:page1 :months="$months" :monthDays="$monthDays" :inputs="$page1Inputs">
        @elseif($showPage2 === true)
            <livewire:page2 :months="$months" :monthDays="$monthDays" :dob="$page1Inputs['dob']">
        @endif
    </div>
</div>
