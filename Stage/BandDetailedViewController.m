//
//  BandDetailedViewController.m
//  Stage
//
//  Created by Joubin Jabbari on 12/23/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "BandDetailedViewController.h"

#define screenRect [[UIScreen mainScreen] bounds]
#define NAVBARSIZE 50
#define TOPBUTTONS 30
@implementation BandDetailedViewController{
    UINavigationBar *navbar;
    CustomScrollView *scrollView;
    UISegmentedControl *segmentedControl;
    double lastOffSet;
    Band *band;
}

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil withData:(PFObject *)dt{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    _data = dt;
    if (self) {
        [self setupView];

        
    }
    return self;
}

- (id)initWithData:(Band *)dt{
    self = [super initWithNibName:nil bundle:nil];
    _data = [dt getPFObject];
    if (self) {
        [self setupView];
    }
    return self;
}

-(void)setupView{
    navbar = [[UINavigationBar alloc]initWithFrame:CGRectMake(0, 0, screenRect.size.width, NAVBARSIZE)];


    
    UIView *rightview = [[UIView alloc] initWithFrame:CGRectMake(0,0,66,30)];
    rightview.backgroundColor = [UIColor blueColor];
    
    UIBarButtonItem *rightButton ;
    rightButton = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemReply target:self action:@selector(dismiss)];
    UINavigationItem *item = [[UINavigationItem alloc] initWithTitle:[_data objectForKey:@"BandName"]];
    rightButton.tintColor = [UIColor blueColor];
    [[UINavigationBar appearance] setTitleTextAttributes:@{NSForegroundColorAttributeName : [UIColor blueColor]}];
    item.leftBarButtonItem = rightButton;
    item.hidesBackButton = YES;
    [navbar pushNavigationItem:item animated:NO];
    
    [self.view addSubview:navbar];
    [self.view setBackgroundColor:[UIColor whiteColor]];
    
    NSArray *itemArray = [NSArray arrayWithObjects: @"Bio", @"Social", @"Music", nil];
    segmentedControl = [[UISegmentedControl alloc] initWithItems:itemArray];
    segmentedControl.frame = CGRectMake(0, NAVBARSIZE, screenRect.size.width, TOPBUTTONS);
    segmentedControl.tintColor = [UIColor blackColor];
    segmentedControl.selectedSegmentIndex = 0;
    [segmentedControl setBackgroundColor:[UIColor whiteColor]];
    [segmentedControl addTarget:self action:@selector(decodeButton:) forControlEvents:UIControlEventValueChanged];
    [self.view addSubview:segmentedControl];
    
    
//    UIButton *facebookButton = [UIButton buttonWithType:UIButtonTypeSystem];
//    [facebookButton addTarget:self action:@selector(FBPressed) forControlEvents:UIControlEventAllTouchEvents];
//    [facebookButton setTitle:@"Facebook" forState:UIControlStateNormal];
//    //    facebookButton.tintColor = [UIColor blackColor];
//    //    facebookButton.titleLabel.tintColor = [UIColor blackColor];
//    //    [facebookButton setTitleColor:[UIColor blackColor] forState:UIControlStateNormal];
//    facebookButton.frame = CGRectMake(10.0, screenRect.size.height-40, 160.0, 40.0);
//    facebookButton.layer.zPosition = 1;
//    facebookButton.layer.borderWidth = 2;
//    facebookButton.layer.borderColor = [[UIColor blackColor] CGColor];
//    facebookButton.backgroundColor = [UIColor blueColor];
//    [self.view addSubview:facebookButton];

    SocialButtons *socialPanel = [[SocialButtons alloc] initWithFrame:CGRectMake(0, screenRect.size.height-NAVBARSIZE, screenRect.size.width, NAVBARSIZE)];
    [[socialPanel addButtonWithTitle:FACEBOOK] addTarget:self action:@selector(FBPressed) forControlEvents:UIControlEventAllTouchEvents];
    [socialPanel addButtonWithTitle:TWITTER];
    [[socialPanel addButtonWithTitle:FAVORIT] addTarget:self action:@selector(FavePressed:) forControlEvents:UIControlEventAllTouchEvents];
;

   
    [self.view addSubview:socialPanel];
    
    
    
    
    
    scrollView = [[CustomScrollView alloc] initWithFrame:CGRectMake(0, NAVBARSIZE+TOPBUTTONS, screenRect.size.width, screenRect.size.height-NAVBARSIZE-TOPBUTTONS-socialPanel.frame.size.height)];
    scrollView.contentSize = CGSizeMake(screenRect.size.width, screenRect.size.height);
    scrollView.showsHorizontalScrollIndicator = NO;
    scrollView.showsVerticalScrollIndicator = YES;
    scrollView.translatesAutoresizingMaskIntoConstraints = NO;
    [scrollView setBackgroundColor:[UIColor whiteColor]];
    

    

    
    UIImageView *bannerImage = [[UIImageView alloc] initWithFrame:CGRectMake(0, 0, screenRect.size.width, 200)];

    bannerImage.image = [UIImage imageWithData:[NSData dataWithContentsOfURL:[NSURL URLWithString:[_data objectForKey:@"Image"]]]];
    [bannerImage sizeThatFits:CGSizeMake(screenRect.size.width, 500)];
    [scrollView addItem:bannerImage];
    
    
    
 
    
    bannerImage.translatesAutoresizingMaskIntoConstraints = NO;

    UILabel *aboutUs = [[UILabel alloc] initWithFrame:CGRectMake(10, 0, screenRect.size.width-20, 10)];
//    UILabel *aboutUs = [[UILabel alloc] init];

    aboutUs.text = @"Bio: asd asd asd asd asd asd asd asdf sdaf sdfkjads flasjdkfh asjlkdfha sdfhj wpeuhc    pueh fsdfhj qe;fhj sdfh[q iv    dih si;ah v;isdhf a;dskhlf e[uhwv ;sdihf j ljkhg sadjhlf lasjdkfh qjh e phiew;rh w;erhkl l;shf a;lshdf ;alhsdfq;ehkf [Sdfhl;sadhf ;qef q;ehfq;wehf sfsidhf 23i r2 3r2 3r 23r 23r   sdf; aisdf asdf sad fasd  a a a df";
    aboutUs.lineBreakMode = NSLineBreakByWordWrapping;
    aboutUs.numberOfLines = 0;
    [aboutUs sizeToFit];
    [scrollView addItem:aboutUs];

    [scrollView setDelegate:self];

    [self.view addSubview:scrollView];
    segmentedControl.layer.zPosition = 1;
    segmentedControl.accessibilityHint = [NSString stringWithFormat:@"%f", segmentedControl.frame.origin.y];


    


}



-(void) dismiss{
    [self dismissViewControllerAnimated:YES completion:nil];
}

//- (void)scrollViewDidScroll:(UIScrollView *)thisScrollView{
//    NSLog(@"%f", scrollView.contentOffset.y);
//    CGRect headerFrame = segmentedControl.frame;
//    headerFrame.origin.y = MAX([segmentedControl.accessibilityHint integerValue], scrollView.contentOffset.y);
//    segmentedControl.frame = headerFrame;
//    if (navbar.frame.size.height >= 50 || navbar.frame.size.height <= NAVBARSIZE) {
//        if (lastOffSet < thisScrollView.contentOffset.y) {
//            //we are growing
//            navbar.frame = CGRectMake(0, 0, screenRect.size.width, MAX(50,navbar.frame.size.height-15));
//            NSLog(@"making bigger");
//
//        }else{
//            navbar.frame = CGRectMake(0, 0, screenRect.size.width, MIN(navbar.frame.size.height+5, NAVBARSIZE));
//            NSLog(@"making smaller");
//
//        }
//        
//        float bottomEdge = scrollView.contentOffset.y + scrollView.frame.size.height;
//        if (bottomEdge >= scrollView.contentSize.height || thisScrollView.contentOffset.y == 0) {
//        }else{
//            thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
//        }
//
////        NSLog(@"%f %f", lastOffSet, thisScrollView.contentOffset.y);
////        lastOffSet = thisScrollView.contentOffset.y;
////        thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
////        
//
//    }
//    
//}
//
//
//- (void)scrollViewDidEndDecelerating:(UIScrollView *)thisScrollView {
//    float bottomEdge = scrollView.contentOffset.y + scrollView.frame.size.height;
//    if (bottomEdge >= scrollView.contentSize.height) {
//            thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
//    }
//    if (thisScrollView.contentOffset.y == 0) {
//         thisScrollView.frame = CGRectMake(0, navbar.frame.size.height, screenRect.size.width, screenRect.size.height-navbar.frame.size.height);
//    }
//}


- (IBAction)decodeButton:(id)sender {
    
    if (segmentedControl.selectedSegmentIndex == 0) {
        [scrollView setHidden:NO];
    } else if(segmentedControl.selectedSegmentIndex == 1) {
        [scrollView setHidden:YES];
    } else if(segmentedControl.selectedSegmentIndex == 2) {
        [scrollView setHidden:YES];
    }
}


-(IBAction)FBPressed{
    if ([SLComposeViewController isAvailableForServiceType:SLServiceTypeFacebook])
    {
        SLComposeViewController *fbPostSheet = [SLComposeViewController composeViewControllerForServiceType:SLServiceTypeFacebook];
        [fbPostSheet setInitialText:@"Found a new band, tell me what you think!"];
        [self presentViewController:fbPostSheet animated:YES completion:nil];
    } else
    {
        UIAlertView *alertView = [[UIAlertView alloc]
                                  initWithTitle:@"Sorry"
                                  message:@"You can't post right now, make sure your device has an internet connection and you have at least one facebook account setup"
                                  delegate:self
                                  cancelButtonTitle:@"OK"
                                  otherButtonTitles:nil];
        [alertView show];
    }
}

-(void) FavePressed:(UIButton *) sender{
    [sender setBackgroundColor:[UIColor yellowColor]];
}
@end
