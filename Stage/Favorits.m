//
//  Favorits.m
//  Stage
//
//  Created by Joubin Jabbari on 12/27/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "Favorits.h"
#import <AVFoundation/AVFoundation.h>
#import <MediaPlayer/MediaPlayer.h>
@implementation Favorits{
    AVAudioPlayer *audio_player;
    NSTimer *timer;
    UIImageView *playIndicator;
    UIButton *play, *prev, *forward, *pauseButton;
}


- (instancetype)init
{
    self = [super init];
    if (self) {
    
        self.tableData = [[NSMutableDictionary alloc] init];
        playIndicator = [[UIImageView alloc]initWithImage:[UIImage imageNamed:@"Media-Pause-128.png"]];
        [playIndicator setFrame:CGRectMake(0, 0, 25, 25)];
        [playIndicator setTintColor:[UIColor blackColor]];
        [playIndicator setBackgroundColor:[UIColor blackColor]];
        self.tableData[@"someSong"] = @"NewRecord.mp3";
        self.tableData[@"someOtherSong"] = @"test.mp3";
        self.refreshControl = [[UIRefreshControl alloc] init];
        [self.refreshControl addTarget:self action:@selector(handleRefresh) forControlEvents:UIControlEventValueChanged];
        self.tbl = [[UITableView alloc] initWithFrame:CGRectMake(0, 20, screenRect.size.width, screenRect.size.height/2)];
        [self.tbl setDataSource:self];
        [self.tbl setDelegate:self];
        [self.tbl addSubview:self.refreshControl];
        [self.view setBackgroundColor:[UIColor whiteColor]];
        [self.view addSubview:self.tbl];
        self.tbl.layer.zPosition = 1;
        play = [UIButton buttonWithType:UIButtonTypeRoundedRect];
        forward = [UIButton buttonWithType:UIButtonTypeRoundedRect];
        prev = [UIButton buttonWithType:UIButtonTypeRoundedRect];
        pauseButton = [UIButton buttonWithType:UIButtonTypeRoundedRect];
        [self.view addSubview:play];
        [self.view addSubview:pauseButton];
        [pauseButton setHidden:YES];

        [pauseButton setImage:[UIImage imageNamed:@"Media-Pause-128.png"] forState:UIControlStateNormal];
        [pauseButton setFrame:CGRectMake(0, 0, 100, 20)];
        [pauseButton sizeToFit];
        [pauseButton.imageView sizeToFit];
        [pauseButton setCenter:CGPointMake(screenRect.size.width/2, screenRect.size.height*.8)];
        [pauseButton addTarget:self action:@selector(pause) forControlEvents:UIControlEventAllEvents];
      

        [play setImage:[UIImage imageNamed:@"Media-Play-128.png"] forState:UIControlStateNormal];
        [play setFrame:CGRectMake(0, 0, 100, 20)];
        [play sizeToFit];
        [play.imageView sizeToFit];
        [play setCenter:CGPointMake(screenRect.size.width/2, screenRect.size.height*.8)];
        [play addTarget:self action:@selector(playAtcurrentPlace) forControlEvents:UIControlEventAllEvents];
        
        [prev setImage:[UIImage imageNamed:@"Media-Rewind-128.png"] forState:UIControlStateNormal];
        [prev setFrame:CGRectMake(0, 0, 100, 20)];
        [prev sizeToFit];
        [prev setCenter:CGPointMake(screenRect.size.width/3, screenRect.size.height*.8)];
        [prev addTarget:self action:@selector(lastSong) forControlEvents:UIControlEventAllEvents];
        [prev.imageView sizeToFit];
        [self.view addSubview:prev];

        
        [forward setImage:[UIImage imageNamed:@"Media-Fast-Forward-128.png"] forState:UIControlStateNormal];
        [forward setFrame:CGRectMake(0, 0, 100, 20)];
        [forward sizeToFit];
        [forward setCenter:CGPointMake(screenRect.size.width/1.5, screenRect.size.height*.8)];
        [forward addTarget:self action:@selector(nextSong) forControlEvents:UIControlEventAllEvents];
        [forward.imageView sizeToFit];
        [self.view addSubview:forward];
        
        self.seekbar = [[UISlider alloc] initWithFrame:CGRectMake(10, 300, screenRect.size.width*.8, 10)];
        [self.seekbar setCenter:CGPointMake(screenRect.size.width/2, screenRect.size.height*.9)];
        self.seekbar.minimumValue = 0;
        self.seekbar.maximumValue = audio_player.duration;
        self.seekbar.layer.zPosition = 1;
        [self.view addSubview:self.seekbar];
   
        [self.seekbar addTarget:self action:@selector(sliderChanged:) forControlEvents:UIControlEventValueChanged];
        UIImage *empty = [UIImage new];

        [self.seekbar setThumbImage:empty forState:UIControlStateNormal];
        
        audio_player = nil;
        NSString *path = [NSString stringWithFormat:@"%@/%@", [[NSBundle mainBundle] resourcePath], [[self.tableData allKeys] objectAtIndex:0]];
        NSURL *soundUrl = [NSURL fileURLWithPath:path];
        audio_player = [[AVAudioPlayer alloc] initWithContentsOfURL:soundUrl error:nil];
        
        audio_player.delegate = self;
        
        
        [[AVAudioSession sharedInstance] setCategory:AVAudioSessionCategoryPlayback error:nil];
        [[AVAudioSession sharedInstance] setActive: YES error: nil];
        [[UIApplication sharedApplication] beginReceivingRemoteControlEvents];

        [self becomeFirstResponder];

        
    }
    return self;
}

#pragma tableview
- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section{
    NSLog(@"%lu",(unsigned long)[self.tableData count]);
    return [self.tableData count];
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath{
    static NSString *CellIdentifier = @"Cell";
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:CellIdentifier];
    if (cell == nil) {
        cell = [[UITableViewCell alloc] initWithStyle:UITableViewCellStyleDefault reuseIdentifier:CellIdentifier];
    }
    cell.textLabel.text = [[self.tableData allKeys] objectAtIndex:indexPath.row];
    cell.textLabel.textAlignment = NSTextAlignmentCenter;
    return cell;
}

- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath
{
    [audio_player stop];
    audio_player = nil;
    NSString *filename = [self.tableData objectForKey:[[self.tableData allKeys] objectAtIndex:indexPath.row]];
    [self playaudio:filename];
    [tableView deselectRowAtIndexPath:indexPath animated:YES];
    [playIndicator removeFromSuperview];
    [[tableView cellForRowAtIndexPath:indexPath] addSubview:playIndicator];
}




-(void) handleRefresh{
    [self.tbl reloadData];
    [self.refreshControl endRefreshing];
    
}


- (IBAction)sliderChanged:(UISlider *)sender {
    // Fast skip the music when user scroll the UISlider
    [audio_player stop];
    [audio_player setCurrentTime:self.seekbar.value];
    [audio_player prepareToPlay];
    [audio_player play];
    [play setImage:[UIImage imageNamed:@"Media-Play-128.png"] forState:UIControlStateNormal];
    
    NSMutableDictionary *playingInfo = [NSMutableDictionary dictionaryWithDictionary:[[MPNowPlayingInfoCenter defaultCenter] nowPlayingInfo] ];
    [playingInfo setObject:[NSNumber numberWithFloat:self.seekbar.value] forKey:MPNowPlayingInfoPropertyElapsedPlaybackTime];
    [[MPNowPlayingInfoCenter defaultCenter] setNowPlayingInfo:playingInfo];
    

}

// Stop the timer when the music is finished (Need to implement the AVAudioPlayerDelegate in the Controller header)
- (void)audioPlayerDidFinishPlaying:(AVAudioPlayer *)player successfully:(BOOL)flag {
    // Music completed
    if (flag) {
        [timer invalidate];
        [pauseButton setHidden:YES];
        [play setHidden:NO];
        self.seekbar.value = 0;
        
    }
    
}

- (void)updateSlider {
    // Update the slider about the music time
    if([audio_player isPlaying])
        self.seekbar.value = audio_player.currentTime;
}

-(void)playAtcurrentPlace{
    [audio_player play];
    [pauseButton setHidden:NO];
    [play setHidden:YES];
    timer = [NSTimer scheduledTimerWithTimeInterval:1 target:self selector:@selector(updateSlider) userInfo:nil repeats:YES];
    
}

- (void) playaudio: (NSString *) filename
{
    
    if (filename == nil) {
        [audio_player setCurrentTime:0];
        [audio_player play];
    }else{
        NSString *path = [NSString stringWithFormat:@"%@/%@", [[NSBundle mainBundle] resourcePath], filename];
        NSURL *url = [NSURL fileURLWithPath:path];
        audio_player = [[AVAudioPlayer alloc]
                                initWithContentsOfURL:url error:nil];
        audio_player.currentTime = 0; //this could be outside the if if you want it to start over when they hit play
        [audio_player play];
    }
    

    [self.seekbar addTarget:self action:@selector(sliderChanged:) forControlEvents:UIControlEventValueChanged];
    audio_player.delegate = self;
    self.seekbar.maximumValue = audio_player.duration;
    [pauseButton setHidden:NO];
    [play setHidden:YES];
    timer = [NSTimer scheduledTimerWithTimeInterval:1 target:self selector:@selector(updateSlider) userInfo:nil repeats:YES];

    MPMediaItemArtwork *albumArt = [[MPMediaItemArtwork alloc] initWithImage:[UIImage imageNamed:@"blue"]];

    NSDictionary *info = @{ MPMediaItemPropertyArtist: @"joubin",
                            MPMediaItemPropertyAlbumTitle: @"Alb",
                            MPMediaItemPropertyTitle: @"song",
                            MPMediaItemPropertyPlaybackDuration: [NSNumber numberWithFloat:[audio_player duration]],
                            MPMediaItemPropertyArtwork: albumArt};
    
    [MPNowPlayingInfoCenter defaultCenter].nowPlayingInfo = info;

    

}

- (void)pause{
    [audio_player pause];
    [pauseButton setHidden:YES];
    [play setHidden:NO];
}

-(void)resume{
    [audio_player play];
    [pauseButton setHidden:NO];
    [play setHidden:YES];
    timer = [NSTimer scheduledTimerWithTimeInterval:1 target:self selector:@selector(updateSlider) userInfo:nil repeats:YES];
}

- (void)stop:(id)sender{
    [audio_player stop];
}

-(void) lastSong{
    NSArray *parts = [[NSString stringWithFormat:@"%@", [audio_player url]] componentsSeparatedByString:@"/"];
    NSString *filename = [parts objectAtIndex:[parts count]-1];
    int next = ((int)[[self.tableData allKeys] indexOfObject:filename])+1;
    NSString *songName = [self.tableData objectForKey:[[self.tableData allKeys] objectAtIndex:next]];
    if ([audio_player currentTime] > 10) {
        [audio_player setCurrentTime:0];
    }else{
        [self playaudio:songName];
    }
}

-(void) nextSong{
    
}

- (void)remoteControlReceivedWithEvent:(UIEvent *)event {
    //if it is a remote control event handle it correctly
    if (event.type == UIEventTypeRemoteControl)
    {
        if (event.subtype == UIEventSubtypeRemoteControlPlay)
        {
            [self playAtcurrentPlace];
        }
        else if (event.subtype == UIEventSubtypeRemoteControlPause)
        {
            [self pause];
        }
        else if (event.subtype == UIEventSubtypeRemoteControlTogglePlayPause)
        {
            //[self togglePlayPause];
            NSLog(@"ASD");
        }
        
        else if (event.subtype == UIEventSubtypeRemoteControlBeginSeekingBackward)
        {
            [self lastSong]; //You must implement 15" rewinding in this method.
        }
        else if (event.subtype == UIEventSubtypeRemoteControlBeginSeekingForward)
        {
            [self nextSong]; //You must implement 15" fast-forwarding in this method.
        }
        
    }
}

- (BOOL)canBecomeFirstResponder {
    return YES;
}
@end
