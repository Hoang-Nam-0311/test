
    public function scopeIsActive($query)
    {
        return $this->where('status',1)->orderBy('id','DESC');
    }
}
