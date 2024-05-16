<div>
    <div>
        @if($page === 1)
            <livewire:page1 :months="$months" :monthDays="$monthDays" :inputs="$page1Inputs">
        @elseif($page === 2)
            <livewire:page2 :months="$months" :monthDays="$monthDays" :dob="$page1Inputs['dob']">
        @elseif($page === 3)
            <livewire:form-output :formOutput="$formOutput">
        @endif
    </div>
</div>
